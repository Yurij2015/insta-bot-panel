<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCurlRequests\WebProfileInfo;
use App\Http\Requests\ProfileSaveRequest;
use App\Http\Requests\ProxySaveRequest;
use App\Models\Profile;
use App\Models\Proxy;
use File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use JsonException;
use Log;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::with('proxy')->paginate();
        return view('profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Profile $profile, ProfileSaveRequest $profileSaveRequest, ProxySaveRequest $proxySaveRequest): RedirectResponse
    {
        $proxy = Proxy::updateOrCreate(
            [
                'id' => $profile->proxy?->id,
            ],
            [
                'proxy' => $proxySaveRequest->proxy,
                'port' => $proxySaveRequest->port,
                'login' => $proxySaveRequest->login,
                'password' => $proxySaveRequest->proxy_password,
            ]
        );

        Profile::updateOrCreate(
            [
                'id' => $profile->id,
            ],
            [
                'username' => $profileSaveRequest->username,
                'password' => $profileSaveRequest->password,
                'token' => $profileSaveRequest->cookie,
                'type' => $profileSaveRequest->token,
                'sessionid' => $profileSaveRequest->fb_dtsg,
                'ds_user_id' => $profileSaveRequest->user_agent,
                'x_ig_app_id' => $profileSaveRequest->raw_data,
                'proxy_id' => $proxy->id,
            ]
        );

        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('profile.show', compact('profile'));
    }

    /**
     * @throws JsonException
     */
    public function personalProfileInfo(Profile $profile, WebProfileInfo $webProfileInfo)
    {
        $personalProfileData = Profile::with('profileData')->find($profile->id);

        $fileExist = File::exists(public_path("uploads/profiles/images/$personalProfileData->username" . ".jpg"));

        if (!$fileExist) {
            $this->downloadAndSaveImage($personalProfileData->profileData->profile_pic_url, $personalProfileData->username . '.jpg');
        }

        if (!$personalProfileData->profileData) {
            $webProfileInfo->getWebProfileInfo($profile);
        }
        return view('profile.personal-profile-info', compact('personalProfileData'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }

    private function downloadAndSaveImage($imageUrl, $imageName): void
    {
        try {
            $imageContent = file_get_contents($imageUrl);
            Storage::disk('public')->put('profiles/images' . '/' . $imageName, $imageContent);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
