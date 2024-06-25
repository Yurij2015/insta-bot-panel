<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WalkingTaskHistorySaveRequest extends FormRequest
{
    public const REQUIRED_100 = 'required|max:100';
    public const INTEGER = 'integer';

    public function rules(): array
    {
        return [
            'walking_task_id' => self::INTEGER,
            'working_profile_id' => self::INTEGER,
            'working_profile_username' => self::REQUIRED_100,
            'handled_profile_login' => self::REQUIRED_100,
            'page_title' => self::REQUIRED_100,
            'pause_after_scrolling_started' => self::REQUIRED_100,
            'pause_after_scrolling_finished' => self::REQUIRED_100,
            'pause_after_work_with_profile_started' => self::REQUIRED_100,
            'pause_after_work_with_profile_finished' => self::REQUIRED_100,
        ];
    }
}
