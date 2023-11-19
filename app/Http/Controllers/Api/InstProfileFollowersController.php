<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProfileFollowers;
use Exception;
use Illuminate\Support\Facades\Log;
use JsonException;

class InstProfileFollowersController extends Controller
{
    /**
     * @throws JsonException
     * @throws Exception
     */
    public function index(): void
    {
        $ch = curl_init();
        $profileId = 56193441514;
        $maxId = null;
        $continue = true;
        while ($maxId || $continue) {
            if (!$maxId) {
                $url = "https://www.instagram.com/api/v1/friendships/{$profileId}/followers/?count=12&search_surface=follow_list_page";
            } else {
                $url = "https://www.instagram.com/api/v1/friendships/{$profileId}/followers/?count=12&max_id={$maxId}&search_surface=follow_list_page";
            }
            Log::info($url);

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

            curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
            curl_setopt($ch, CURLOPT_PROXY, '104.239.124.88:6366');
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'nwdthtif:3u160iuuvmie');

            $headers = array();
            $headers[] = 'Cookie: ds_user_id=62496662896; sessionid=62496662896%3As9aCx6DlpFFCpD%3A27%3AAYfHIBBKWrQR1en8PLXyfZtHwb9D4BhDJlBp5Tg3eQ;';
            $headers[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36';
            $headers[] = 'X-Ig-App-Id: 936619743392459';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
            $result = json_decode($result, true, 512, JSON_THROW_ON_ERROR);
            if ($result['status'] === 'ok') {
                $this->saveFollowers($result['users'], $profileId);
            }
            $maxId = $result['next_max_id'] ?? null;
            $continue = (bool)$result['next_max_id'];
            usleep(random_int(300000, 900000));
        }
    }

    private function saveFollowers($users, $profileid): void
    {
        foreach ($users as $user) {
            $pkid = $user['pk_id'] ?? null;
            $result = ProfileFollowers::updateOrCreate(
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
            Log::info($result);
        }
    }
}
