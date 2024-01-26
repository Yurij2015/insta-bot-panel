<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsSaveRequest extends FormRequest
{
    public const REQUIRED_100 = 'required|string|max:100';
    public const STRING_250 = 'string|max:250';
    public const NO_MORE_THAN = 'The field is required and must be more than';
    public const NO_LESS_THAN = 'The field is required and must be less than';
    public const REQUIRED_TEXT = 'The field is required';
    public function rules(): array
    {
        return [
            'lower_limit_task' => self::REQUIRED_100,
            'upper_limit_task' => self::REQUIRED_100,
            'lower_limit_profile_activity' => self::REQUIRED_100,
            'upper_limit_profile_activity' => self::REQUIRED_100,
            'lower_limit_processed_profiles' => self::REQUIRED_100,
            'upper_limit_processed_profiles' => self::REQUIRED_100,
            'lower_limit_operations_number' => self::REQUIRED_100,
            'upper_limit_operations_number' => self::REQUIRED_100,
            'lower_limit_followers' => self::REQUIRED_100,
            'upper_limit_followers' => self::REQUIRED_100,
            'lower_limit_followings' => self::REQUIRED_100,
            'upper_limit_followings' => self::REQUIRED_100,
            'lower_limit_likes' => self::REQUIRED_100,
            'upper_limit_likes' => self::REQUIRED_100,
            'lower_limit_unfollows' => self::REQUIRED_100,
            'upper_limit_unfollows' => self::REQUIRED_100,
            'lower_limit_comments' => self::REQUIRED_100,
            'upper_limit_comments' => self::REQUIRED_100,
            'lower_limit_likes_for_profile' => self::REQUIRED_100,
            'upper_limit_likes_for_profile' => self::REQUIRED_100,
            'lower_limit_unfollows_for_profile' => self::REQUIRED_100,
            'upper_limit_unfollows_for_profile' => self::REQUIRED_100,
            'lower_limit_comments_for_profile' => self::REQUIRED_100,
            'upper_limit_comments_for_profile' => self::REQUIRED_100,
            'lower_limit_follows_for_profile' => self::REQUIRED_100,
            'upper_limit_follows_for_profile' => self::REQUIRED_100,
            'lower_limit_followings_for_profile' => self::REQUIRED_100,
            'upper_limit_followings_for_profile' => self::REQUIRED_100,
            'lower_limit_parsed_accs_for_profile' => self::REQUIRED_100,
            'upper_limit_parsed_accs_for_profile' => self::REQUIRED_100,
            'host_for_browser_work' => self::REQUIRED_100,
            'profiles_for_work' => 'array|nullable',
            'start_cron_task_time' => self::REQUIRED_100,
            'task_status' => 'string|nullable',
            'current_task' => 'string|nullable',
            'current_profile' => 'string|nullable',
            'task_types_for_profiles' => 'array|nullable',
            'settings_status' => self::REQUIRED_100,
        ];
    }

    public function messages(): array
    {
        return [
            'lower_limit_task' => self::NO_MORE_THAN . ' ' . 9000000,
            'upper_limit_task' => self::NO_LESS_THAN . ' ' . 14000000,
            'lower_limit_profile_activity' => self::NO_MORE_THAN . ' ' . 9000000,
            'upper_limit_profile_activity' => self::NO_LESS_THAN . ' ' . 14000000,
            'lower_limit_processed_profiles' => self::NO_MORE_THAN . ' ' . 9000000,
            'upper_limit_processed_profiles' => self::NO_LESS_THAN . ' ' . 14000000,
            'lower_limit_operations_number' => self::NO_MORE_THAN . ' ' . 9000000,
            'upper_limit_operations_number' => self::NO_LESS_THAN . ' ' . 14000000,
            'lower_limit_followers' => self::NO_MORE_THAN . ' ' . 9000000,
            'upper_limit_followers' => self::NO_LESS_THAN . ' ' . 14000000,
            'lower_limit_followings' => self::NO_MORE_THAN . ' ' . 9000000,
            'upper_limit_followings' => self::NO_LESS_THAN . ' ' . 14000000,
            'lower_limit_likes' => self::NO_MORE_THAN . ' ' . 9000000,
            'upper_limit_likes' => self::NO_LESS_THAN . ' ' . 14000000,
            'lower_limit_unfollows' =>  self::NO_MORE_THAN . ' ' . 9000000,
            'upper_limit_unfollows' => self::NO_LESS_THAN . ' ' . 14000000,
            'lower_limit_comments' => self::NO_MORE_THAN . ' ' . 9000000,
            'upper_limit_comments' => self::NO_LESS_THAN . ' ' . 14000000,
        ];
    }
}
