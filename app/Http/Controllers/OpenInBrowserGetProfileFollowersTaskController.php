<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Http;

class OpenInBrowserGetProfileFollowersTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(?Profile $profile, string $profileUserNameToGetFollowers)
    {
        if ($profile) {
            $server = 'http://host.docker.internal:3000';
            $endpoint = '/go-through-profiles-in-browser';
            Http::post($server . $endpoint, [
                'profile' => $profile?->toArray(),
                'profiles' => [$profileUserNameToGetFollowers]
            ]);
        }
    }
}
