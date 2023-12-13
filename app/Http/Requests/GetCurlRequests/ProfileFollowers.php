<?php

namespace App\Http\Requests\GetCurlRequests;

use App\Models\GetFollowersTask;
use App\Models\IgUser;
use App\Models\Profile;
use Exception;
use Illuminate\Support\Facades\Log;
use JsonException;

class ProfileFollowers
{
    /**
     * @throws JsonException
     * @throws Exception
     */
    public function getProfileFollowers(int $profileIdToGetFollowers, GetFollowersTask $task, ?Profile $personalProfile): void
    {
        if(!$personalProfile) {
            Log::info('Personal profile not found');
            return;
        }
        $ch = curl_init();
        $maxId = null;
        $continue = true;
        $i = 0;
        while ($maxId || $continue) {
            $task->task_status = 'running';
            $task->save();
            if (!$maxId) {
                $url = "https://www.instagram.com/api/v1/friendships/{$profileIdToGetFollowers}/followers/?count=12&search_surface=follow_list_page";
            } else {
                $url = "https://www.instagram.com/api/v1/friendships/{$profileIdToGetFollowers}/followers/?count=12&max_id={$maxId}&search_surface=follow_list_page";
            }
            Log::info($url);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
            curl_setopt($ch, CURLOPT_PROXY, $personalProfile->proxy->proxy . ':' . $personalProfile->proxy->port,);
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $personalProfile->proxy->login . ':' . $personalProfile->proxy->password);
            $headers = array();
            $headers[] = "Cookie: $personalProfile->cookie";
            $headers[] = "User-Agent: $personalProfile->user_agent";
            $headers[] = 'X-Ig-App-Id: 936619743392459';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                $task->task_status = 'error';
                $task->save();
                Log::error('Error:' . curl_error($ch));
            }
            curl_close($ch);
            $result = json_decode($result, true, 512, JSON_THROW_ON_ERROR);
            if ($result['status'] === 'ok') {
                $this->saveFollowers($result['users'], $profileIdToGetFollowers);
            }
            $maxId = $result['next_max_id'] ?? null;
            $continue = array_key_exists('next_max_id', $result) && $result['next_max_id'];
            $rand_pause = random_int(3000000, 9000000);
            $rand_i = random_int(8, 16);
            $required_delay = random_int(14, 17);
            $remainder_from_division = random_int(1, 9);
            if ($i % $rand_i === $remainder_from_division || $i % $required_delay === 0) {
                $rand_pause = random_int(9000000, 18000000);
            }
            usleep($rand_pause);
            $i++;
        }
    }

    private function saveFollowers($users, $profileid): void //move to repository
    {
        foreach ($users as $user) {
            $pkid = $user['pk_id'] ?? null;
            $profileFollowers = \App\Models\ProfileFollowers::updateOrCreate(
                [
                    'profile_id' => $profileid,
                    'pk_id' => $pkid,
                ],
                [
                    'profile_id' => $profileid,
                    'fbid_v2' => $user['fbid_v2'],
                    'pk' => $user['pk'],
                    'pk_id' => $user['pk_id'],
                    'strong_id__' => $user['strong_id__'],
                    'full_name' => $user['full_name'] ?? null,
                    'is_private' => $user['is_private'] ?? null,
                    'third_party_downloads_enabled' => $user['third_party_downloads_enabled'] ?? null,
                    'has_anonymous_profile_picture' => $user['has_anonymous_profile_picture'] ?? null,
                    'username' => $user['username'] ?? null,
                    'is_verified' => $user['is_verified'] ?? null,
                    'profile_pic_id' => $user['profile_pic_id'] ?? null,
                    'profile_pic_url' => $user['profile_pic_url'] ?? null,
                    'account_badges' => $user['account_badges'] ?? null,
                    'is_possible_scammer' => $user['is_possible_scammer'] ?? null,
                    'is_possible_bad_actor' => $user['is_possible_bad_actor'] ?? null,
                    'latest_reel_media' => $user['latest_reel_media'] ?? null,
                ]);
            $igUserId = IgUser::where('pk', $profileid)->first()->id;
            $profileFollowers->igUsers()->syncWithoutDetaching($igUserId);
            Log::info($profileFollowers);
        }
    }
}
