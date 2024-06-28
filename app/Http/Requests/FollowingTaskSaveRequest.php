<?php

namespace App\Http\Requests;

use App\Rules\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;

class FollowingTaskSaveRequest extends FormRequest
{
    public const STRING_100 = 'max:100|nullable';
    public const INTEGER = 'integer';
    public const BOOL_NULL = 'string|nullable';

    public function rules(): array
    {
        return [
            'working_profile_id' => self::INTEGER,
            'profiles_list' => 'required|json',
            'status' =>  ['required', new TaskStatus()],
            'lower_delay_limit' => self::INTEGER,
            'upper_delay_limit' => self::INTEGER,
            'count_of_screen_scroll' => self::INTEGER,
            'lower_limit_of_followers' => self::INTEGER,
            'upper_limit_of_followers' => self::INTEGER,
            'is_private' => self::BOOL_NULL,
            'is_business' =>  self::BOOL_NULL,
            'is_professional' =>  self::BOOL_NULL,
            'has_avatar' => self::BOOL_NULL,
            'has_posts' =>  self::BOOL_NULL,
            'has_stories' => self::BOOL_NULL,
            'has_url' =>  self::BOOL_NULL,
            'has_phone' => self::BOOL_NULL,
            'has_business_category_name' =>  self::BOOL_NULL,
            'has_category_name' =>  self::BOOL_NULL,
            'category_name' => self::STRING_100,
            'has_bio' => self::BOOL_NULL,
            'lower_posts_limit' => self::INTEGER,
            'lower_stories_limit' => self::INTEGER,
            'started_at' => "date",
            'completed_at' => "date",
        ];
    }
}
