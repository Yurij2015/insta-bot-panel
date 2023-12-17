<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileListsSaveRequest extends FormRequest
{
    public const REQUIRED_255 = 'required|max:255';
    public const MAX_250 = 'max:250';

    public function rules(): array
    {
        return [
            'name' => self::REQUIRED_255,
            'description' => self::MAX_250,
            'ig_username' => self::MAX_250,
            'profiles_list' => 'string',
        ];
    }
}
