<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileSaveRequest extends FormRequest
{
    public const REQUIRED_250 = 'required|max:250';
    public const MAX_250 = 'max:250';

    public function rules(): array
    {
        return [
            'email' => self::MAX_250,
            'phone_number' => self::MAX_250,
            'fullName' => self::MAX_250,
            'username' => self::REQUIRED_250,
            'password' => self::REQUIRED_250,
            'cookie' => self::MAX_250,
            'token' => 'max:500',
            'fb_dtsg' => self::MAX_250,
            'user_agent' => self::MAX_250,
            'raw_data' => 'max:1000',
            'proxy' => 'required|integer',
            'is_registered' => 'integer'
        ];
    }
}
