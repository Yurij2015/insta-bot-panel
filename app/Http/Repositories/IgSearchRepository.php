<?php

namespace App\Http\Repositories;

use App\Models\IgHashtag;
use App\Models\IgPlace;
use App\Models\IgUser;
use App\Models\Profile;
use App\Models\SearchResult;
use Illuminate\Support\Facades\Log;

class IgSearchRepository
{
    public function saveSearchResult($search, $profile_id, $key_word): void
    {
        $profile = Profile::with('profileData')->find($profile_id);
        SearchResult::create([
            'ig_id' => (int)$profile->profileData->inst_id,
            'ig_username' => $profile->username,
            'key_word' => $key_word,
            'see_more' => $search->see_more,
            'inform_module' => $search->inform_module,
            'hashtags' => $search->hashtags,
            'places' => $search->places,
            'users' => $search->users,
            'rank_token' => $search->rank_token
        ]);
    }

    public function saveHashtags($hashtags): void
    {
        foreach ($hashtags as $hashtag) {
            try {
                $message = IgHashtag::updateOrCreate(
                    [
                        'ig_id' => $hashtag->hashtag->id,
                    ],
                    [
                        'name' => $hashtag->hashtag->name,
                        'media_count' => $hashtag->hashtag->media_count,
                    ]
                );
                Log::info(json_encode($message, JSON_THROW_ON_ERROR));
            } catch (\Exception $e) {
                Log::info('error to save hashtag ' . $e->getMessage());
            }
        }
    }

    public function savePlaces($places): void
    {
        foreach ($places as $place) {
            try {
                $message = IgPlace::updateOrCreate(
                    [
                        'location->pk' => $place->place->location->pk,
                    ],
                    [
                        'location' => $place->place->location,
                        'title' => $place->place->title,
                        'subtitle' => $place->place->subtitle,
                    ]
                );
                Log::info(json_encode($message, JSON_THROW_ON_ERROR));
            } catch (\Exception $e) {
                Log::info('error to save place ' . $e->getMessage());
            }
        }
    }

    public function saveUsers($users): void
    {
        foreach ($users as $user) {
            try {
                $message = IgUser::updateOrCreate(
                    [
                        'pk' => $user->user->pk,
                    ],
                    [
                        'username' => $user->user->username,
                        'is_verified' => $user->user->is_verified,
                        'full_name' => $user->user->full_name,
                        'search_social_context' => $user->user->search_social_context,
                        'unseen_count' => $user->user->unseen_count,
                        'pk' => $user->user->pk,
                        'live_broadcast_visibility' => $user->user->live_broadcast_visibility,
                        'live_broadcast_id' => $user->user->live_broadcast_id,
                        'latest_reel_media' => $user->user->latest_reel_media,
                        'seen' => $user->user->seen,
                        'profile_pic_url' => $user->user->profile_pic_url,
                        'is_unpublished' => $user->user->is_unpublished,
                        'ig_id' => $user->user->ig_id ?? null
                    ]
                );
                Log::info(json_encode($message, JSON_THROW_ON_ERROR));
            } catch (\Exception $e) {
                Log::info('error to save user ' . $e->getMessage());
            }
        }
    }
}
