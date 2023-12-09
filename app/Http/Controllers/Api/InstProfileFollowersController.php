<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GetFollowersTask;
use App\Models\IgUser;
use App\Models\SearchResult;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class InstProfileFollowersController extends Controller
{
    public function setGetFollowersTask(int $igUserId): RedirectResponse
    {
        $igUser = IgUser::find($igUserId);
        $profileId = $igUser->pk;

        $getProfileFollowersTaskCount = GetFollowersTask::where('profile_id', $profileId)->count();
        if ($getProfileFollowersTaskCount > 0) {
            Log::info('GetFollowersTask already exists for this profile - ' . $profileId);
        }

        $searchResultId = $igUser->search_result_id;
        $searchResult = SearchResult::find($searchResultId);
        $personalProfileUsername = $searchResult->ig_username;
        $status = 'active';
        $taskStatus = 'waiting';
        GetFollowersTask::updateOrCreate(
            [
                'profile_id' => $profileId,
            ],
            [
                'profile_id' => $profileId,
                'search_result_id' => $searchResultId,
                'personal_profile_username' => $personalProfileUsername,
                'status' => $status,
                'task_status' => $taskStatus,
            ]);
        return redirect()->route('ig-users', ['searchResult' => $searchResultId]);
    }

    public function showFollowers(IgUser $igUser)
    {
        $followers = $igUser->profileFollowers()->paginate(20);
        return view('ig-users.followers', compact('followers', 'igUser'));
    }
}
