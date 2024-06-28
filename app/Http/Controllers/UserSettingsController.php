<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserSettingsController extends Controller
{
    public function index()
    {
        return view('user.settings');
    }

    public function generateToken()
    {
        $user = Auth::user();
        $token = $user?->createToken('Token');
        $token = $token?->plainTextToken;

        return view('user.settings', compact('token'));
    }
}
