<?php

namespace App\Models\Desktop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikingTaskHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'liking_task_id',
        'working_profile_id',
        'working_profile_username',
        'handled_profile_login',
        'count_of_followers',
        'count_of_followings',
        'count_of_posts',
        'count_of_stories',
        'page_title',
        'pause_after_scrolling_started',
        'pause_after_scrolling_finished',
        'pause_before_liking_started',
        'pause_before_liking_finished',
        'profile_post_id',
        'profile_post_url',
        'count_of_likes',
        'count_of_comments',
        'like_button_click_time',
        'pause_after_liking_started',
        'pause_after_liking_finished',
        'pause_after_work_with_profile_started',
        'pause_after_work_with_profile_finished',
    ];
}
