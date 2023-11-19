<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProxySaveRequest extends FormRequest
{
    public const REQUIRED_50 = 'required|max:50';

    public function rules(): array
    {
        return [
            'proxy' => self::REQUIRED_50,
            'port' => self::REQUIRED_50,
            'login' => self::REQUIRED_50,
            'password' => self::REQUIRED_50,
        ];
    }
}
