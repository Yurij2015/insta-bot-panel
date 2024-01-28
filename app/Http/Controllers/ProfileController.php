<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCurlRequests\WebProfileInfo;
use App\Http\Requests\ProfileSaveRequest;
use App\Models\Profile;
use App\Models\Proxy;
use App\Models\UserAgent;
use File;
use Illuminate\Http\RedirectResponse;
use JsonException;
use Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::with('proxy')->paginate(25);
        return view('profile.index', compact('profiles'));
    }

    public function create()
    {
        $proxies = Proxy::doesntHave('profile')->get();
        $userAgents = UserAgent::all();
        $generatedPassword = Str::random(12);
        $faker = Faker::create();

        $randomFirstName = $faker->firstName;
        $randomLastName = $faker->lastName;
        $nameLength = random_int(3, 5);
        $randomUnderline = random_int(1, 2) === 1 ? "_" : "__";

        $randomUsername = Str::lower(substr($randomFirstName, 0, $nameLength) . $randomUnderline . $randomLastName);

        foreach ($userAgents as $userAgent) {
            $userAgent->user_agent = str_replace("\n", '', $userAgent->user_agent);
        }
        return view('profile.create', compact(
                'proxies',
                'userAgents',
                'generatedPassword',
                'randomFirstName',
                'randomLastName',
                'randomUsername'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Profile $profile, ProfileSaveRequest $profileSaveRequest): RedirectResponse
    {
        Profile::updateOrCreate(
            [
                'id' => $profile->id,
            ],
            [
                'email' => $profileSaveRequest->email,
                'phone_number' => $profileSaveRequest->phone_number,
                'fullName' => $profileSaveRequest->fullName,
                'username' => $profileSaveRequest->username,
                'password' => $profileSaveRequest->password,
                'cookie' => $profileSaveRequest->cookie,
                'token' => $profileSaveRequest->token,
                'fb_dtsg' => $profileSaveRequest->fb_dtsg,
                'user_agent' => $profileSaveRequest->user_agent,
                'status' => $profileSaveRequest->status,
                'raw_data' => $profileSaveRequest->raw_data,
                'proxy_id' => $profileSaveRequest->proxy,
                'is_registered' => $profileSaveRequest->is_registered
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
        $webProfileInfo->getWebProfileInfo($profile);

        $fileExist = File::exists(public_path("uploads/profiles/images/$personalProfileData->username" . ".jpg"));

        if (!$fileExist && $personalProfileData->profileData) {
            $this->downloadAndSaveImage($personalProfileData->profileData->profile_pic_url, $personalProfileData->username . '.jpg');
        }
        if (!$personalProfileData->profileData) {
            $webProfileInfo->getWebProfileInfo($profile);
        }
        return view('profile.personal-profile-info', compact('personalProfileData'));
    }

    public function personalProfileRemoveImg(Profile $profile): RedirectResponse
    {
        $fileExist = File::exists(public_path("uploads/profiles/images/$profile->username" . ".jpg"));
        if ($fileExist) {
            File::delete(public_path("uploads/profiles/images/$profile->username" . ".jpg"));
        }
        return redirect()->route('personal-profile-info', $profile->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {

        $proxies = Proxy::doesntHave('profile')->get();
        $userAgents = UserAgent::all();
        foreach ($userAgents as $userAgent) {
            $userAgent->user_agent = str_replace("\n", '', $userAgent->user_agent);
        }
        return view('profile.edit', compact('profile', 'proxies', 'userAgents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileSaveRequest $profileSaveRequest, Profile $profile): RedirectResponse
    {
        $profile->update(
            [
                'email' => $profileSaveRequest->email,
                'phone_number' => $profileSaveRequest->phone_number,
                'fullName' => $profileSaveRequest->fullName,
                'username' => $profileSaveRequest->username,
                'password' => $profileSaveRequest->password,
                'cookie' => $profileSaveRequest->cookie,
                'token' => $profileSaveRequest->token,
                'fb_dtsg' => $profileSaveRequest->fb_dtsg,
                'user_agent' => $profileSaveRequest->user_agent,
                'status' => $profileSaveRequest->status,
                'raw_data' => $profileSaveRequest->raw_data,
                'proxy_id' => $profileSaveRequest->proxy,
                'is_registered' => $profileSaveRequest->is_registered
            ]
        );

        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile): RedirectResponse
    {
        $profile->delete();
        return redirect()->route('profiles.index');
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
