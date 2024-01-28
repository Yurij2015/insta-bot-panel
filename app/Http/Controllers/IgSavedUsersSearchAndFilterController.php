<?php

namespace App\Http\Controllers;

use App\Models\ProfileFollowersWebProfileInfo;
use Illuminate\Http\Request;

class IgSavedUsersSearchAndFilterController extends Controller
{
    public function index(Request $request)
    {
        $noCyrillic = (bool)$request->query('no_cyrillic');
        $businessProfiles = (bool)$request->query('business_profiles');
        $professionalProfiles = (bool)$request->query('professional_profiles');
        $privateProfiles = (bool)$request->query('private_profiles');
        $profiles = ProfileFollowersWebProfileInfo::query();
        if ($noCyrillic) {
            $profiles->where('biography', 'NOT REGEXP', '[\x{0400}-\x{04FF}]');
        }
        if($businessProfiles){
            $profiles->where('is_business_account', $businessProfiles);
        }
        if($professionalProfiles){
            $profiles->where('is_professional_account', $professionalProfiles);
        }
        if($privateProfiles){
            $profiles->where('is_private', $privateProfiles);
        }
        $profiles = $profiles->paginate(20)->appends($request->query());
        return view('ig-users-search-and-filter.index', compact('profiles'));
    }
}
