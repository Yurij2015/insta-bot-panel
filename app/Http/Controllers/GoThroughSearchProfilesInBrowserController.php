<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\SearchResult;
use Illuminate\Support\Facades\Http;

class GoThroughSearchProfilesInBrowserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SearchResult $searchResult)
    {
        $profilesToBrowsing = $searchResult->igUsers()->inRandomOrder()->pluck('username')->toArray();
        $profile = Profile::with('proxy')->where('username', $searchResult->ig_username)->first()?->toArray();
        $server = 'http://host.docker.internal:3000';
        $endpoint = '/go-through-profiles-in-browser';
        Http::post($server . $endpoint, [
            'profile' => $profile,
            'profiles' => $profilesToBrowsing
        ]);
        return redirect()->back();
    }

}
