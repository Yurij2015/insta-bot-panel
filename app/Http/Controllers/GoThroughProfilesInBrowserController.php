<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\ProfileInfo;
use App\Models\ProfileList;
use Illuminate\Support\Facades\Http;

class GoThroughProfilesInBrowserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ProfileList $profileList, ?ProfileInfo $profileInfo = null)
    {
        if($profileInfo){
            $profilesToBrowsing = $profileInfo->profileFollowers()->inRandomOrder()->pluck('username')->toArray();
        } else {
            $profilesToBrowsing  = explode(",",$profileList->profiles_list);
            shuffle($profilesToBrowsing);
        }
        $profile = Profile::with('proxy')->find($profileList->ig_username);
        $server = 'http://host.docker.internal:3000';
        $endpoint = '/go-through-profiles-in-browser';
        Http::post($server . $endpoint, [
            'profile' => $profile->toArray(),
            'profiles' => $profilesToBrowsing
        ]);
        return redirect()->back();
    }
}
