<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LikingTaskHistorySaveRequest extends FormRequest
{
    public const REQUIRED_100 = 'required|max:100';
    public const INTEGER = 'integer';

    public function rules(): array
    {
        return [
            'liking_task_id' => self::INTEGER,
            'working_profile_id' => self::INTEGER,
            'working_profile_username' => self::REQUIRED_100,
            'handled_profile_login' => self::REQUIRED_100,
            'count_of_followers' => self::INTEGER,
            'count_of_followings' => self::INTEGER,
            'count_of_posts' => self::INTEGER,
            'count_of_stories' => self::INTEGER,
            'page_title' => "string|max:250",
            'pause_after_scrolling_started' => self::REQUIRED_100,
            'pause_after_scrolling_finished' => self::REQUIRED_100,
            'pause_before_liking_started' => self::REQUIRED_100,
            'pause_before_liking_finished' => self::REQUIRED_100,
            'profile_post_id' => self::REQUIRED_100,
            'profile_post_url' => "string|max:250",
            'count_of_likes' => self::INTEGER,
            'count_of_comments' => self::INTEGER,
            'like_button_click_time' => self::REQUIRED_100,
            'pause_after_liking_started' => self::REQUIRED_100,
            'pause_after_liking_finished' => self::REQUIRED_100,
            'pause_after_work_with_profile_started' => self::REQUIRED_100,
            'pause_after_work_with_profile_finished' => self::REQUIRED_100,
        ];
    }
}
