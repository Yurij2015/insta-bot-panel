<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Http;

class OpenInBrowserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Profile $profile)
    {
        $server = 'http://host.docker.internal:3000';
        $endpoint = '/open-in-browser';
        Http::post($server . $endpoint, [
            'username' => $profile->username,
            'password' => $profile->password,
            'user_agent' => $profile->user_agent,
            'proxy' => $profile->proxy->proxy,
            'proxy_port' => $profile->proxy->port,
            'proxy_login' => $profile->proxy->login,
            'proxy_password' => $profile->proxy->password,
        ]);
        return redirect()->route('profiles.index');
    }
}
