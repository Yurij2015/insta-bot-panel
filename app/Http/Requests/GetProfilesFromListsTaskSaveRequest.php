<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetProfilesFromListsTaskSaveRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'personal_profile_to_work' => 'string',
            'profile_list_id' => 'integer',
            'status' => 'string',
            'task_status' => 'string',
            'task_started_at' => 'date_format:Y-m-d H:i:s',
            'task_stoped_at' => 'date_format:Y-m-d H:i:s'
        ];
    }
}
