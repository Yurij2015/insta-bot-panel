<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GetFollowersTask;
use App\Models\GetProfilesDataFromListTask;
use App\Models\IgUser;
use App\Models\Profile;
use App\Models\ProfileInfo;
use App\Models\ProfileList;
use App\Models\SearchResult;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use App\Models\ProfileFollowers as ProfileFlws;

class InstProfileFollowersController extends Controller
{
    public function setGetFollowersTaskForSearch(int $igUserId): RedirectResponse
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
        return redirect()->back();
    }

    public function setGetFollowersTaskForProfileOfList(ProfileList $profileList, ProfileInfo $profileInfo): RedirectResponse
    {
        $getProfileFollowersTaskCount = GetFollowersTask::where('profile_id', $profileInfo->inst_id)->count();
        if ($getProfileFollowersTaskCount > 0) {
            Log::info('GetFollowersTask already exists for this profile - ' . $profileInfo->inst_id);
            return redirect()->back()->with('error', 'Task already isset');
        }

        $personalProfileUsername = Profile::find($profileList->ig_username);
        $status = 'active';
        $taskStatus = 'waiting';
        GetFollowersTask::updateOrCreate(
            [
                'profile_id' => $profileInfo->inst_id,
            ],
            [
                'profile_id' => $profileInfo->inst_id,
                'search_result_id' => null,
                'personal_profile_username' => $personalProfileUsername->username,
                'status' => $status,
                'task_status' => $taskStatus,
            ]);
        return redirect()->back()->with('success', 'Task created succesfully');
    }

    public function setGetProfilesOfListData(ProfileList $profileList, ProfileInfo $profileInfo): RedirectResponse
    {
        $getProfileFollowersTaskCount = GetFollowersTask::where('profile_id', $profileInfo->inst_id)->count();
        if ($getProfileFollowersTaskCount > 0) {
            Log::info('GetFollowersTask already exists for this profile - ' . $profileInfo->inst_id);
            return redirect()->back()->with('error', 'Task already isset');
        }

        $personalProfileUsername = Profile::find($profileList->ig_username)->username;
        $status = 'active';
        $taskStatus = 'waiting';
        GetProfilesDataFromListTask::updateOrCreate(
            [
                'profile_list_id' => $profileList->id,
            ],
            [
                'personal_profile_to_work' => $personalProfileUsername,
                'profile_list_id' => $profileList->id,
                'status' => $status,
                'task_status' => $taskStatus,
            ]);
        return redirect()->back()->with('success', 'Task created succesfully');
    }

    public function showFollowers(IgUser $igUser)
    {
        $followers = $igUser->profileFollowers()->paginate(20);
        if(!$igUser->profileFollowers()->count()){
            $followers = ProfileFlws::where('profile_id', $igUser->pk)->paginate(20);
        }
        return view('ig-users.followers', compact('followers', 'igUser'));
    }
}
