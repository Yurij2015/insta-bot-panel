<?php

namespace App\Http\Requests;

use App\Rules\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;

class WalkingTaskSaveRequest extends FormRequest
{
    public const INTEGER = 'integer';

    public function rules(): array
    {
        return [
            'working_profile_id' => self::INTEGER,
            'profiles_list' => 'required|json',
            'status' =>  ['required', new TaskStatus()],
            'lower_delay_limit' => self::INTEGER,
            'upper_delay_limit' => self::INTEGER,
            'started_at' => "date",
            'completed_at' => "date",
        ];
    }
}
