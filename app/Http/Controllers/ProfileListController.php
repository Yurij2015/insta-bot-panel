<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetProfilesFromListsTaskSaveRequest;
use App\Http\Requests\ProfileListsSaveRequest;
use App\Models\GetProfilesDataFromListTask;
use App\Models\Profile;
use App\Models\ProfileList;
use Illuminate\Http\RedirectResponse;

class ProfileListController extends Controller
{
    public function index()
    {
        $profilesList = ProfileList::paginate(20);
        $profilesList->getCollection()->transform(function ($list) {
            $list->personal_profile_to_work = Profile::find((int)$list->ig_username)->username;
            $list->task_created = GetProfilesDataFromListTask::where('profile_list_id', $list->id)->first();
            return $list;
        });
        return view('profile-list.index', compact('profilesList'));
    }

    public function addProfileList()
    {
        $profiles = Profile::where('status', 'active_web')->get();
        return view('profile-list.add-profiles-list', compact('profiles'));
    }

    public function editProfileList(ProfileList $profileList)
    {
        $profiles = Profile::where('status', 'active_web')->get();
        return view('profile-list.edit-profiles-list', compact('profiles', 'profileList'));
    }

    public function storeProfilesList(ProfileListsSaveRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        if (isset($validatedData['profiles_list'])) {
            $validatedData['profiles_list'] = $this->prepareList($validatedData['profiles_list']);
        }

        ProfileList::create($validatedData);
        return redirect()->route('profile-lists');
    }

    public function updateProfilesList(ProfileListsSaveRequest $request, ProfileList $profileList): RedirectResponse
    {
        $validatedData = $request->validated();
        $profileList->update($validatedData);
        return redirect()->route('profile-lists');
    }

    public function deleteProfileList(ProfileList $profileList): RedirectResponse
    {
        if (!$profileList->profiles_list) {
            $profileList->delete();
            return redirect()->back()->with('success', 'ProfileList deleted');
        }
        return redirect()->back()->with('error', 'ProfileList can not be deleted!');
    }

    public function setGetProfilesFromListTask(ProfileList $profileList, GetProfilesFromListsTaskSaveRequest $taskSaveRequest): RedirectResponse
    {
        $getProfilesFromListTask = GetProfilesDataFromListTask::where('profile_list_id', $profileList->id)->first();
        if ($getProfilesFromListTask) {
            return redirect()->back()->with('error', 'Task can not be created!');
        }
        $presonalProfileToWork = Profile::find($profileList->ig_username)->username;
        $status = 'active';
        $taskStatus = 'waiting';
        $validatedData = $taskSaveRequest->validated();
        $validatedData['profile_list_id'] = $profileList->id;
        $validatedData['personal_profile_to_work'] = $presonalProfileToWork;
        $validatedData['status'] = $status;
        $validatedData['task_status'] = $taskStatus;
        GetProfilesDataFromListTask::create($validatedData);
        return redirect()->back()->with('success', 'Task succesfully created!!!');
    }

    private function prepareList($list): string
    {
        $profilesList = explode("\r\n", $list);
        $preparedList = [];

        foreach ($profilesList as $str) {
            if (preg_match('/\(@([^)]+)\)/', $str, $matches)) {
                $preparedList[] = $matches[1];
            } elseif (preg_match('/www\.instagram\.com\/([A-Za-z0-9_.]+)/', $str, $matches)) {
                $username = explode('/', $matches[1])[0];
                $preparedList[] = $username;
            }
        }
        return implode(",", $preparedList);
    }
}
