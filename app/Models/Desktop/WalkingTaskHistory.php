<?php

namespace App\Models\Desktop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkingTaskHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'walking_task_id',
        'working_profile_id',
        'working_profile_username',
        'handled_profile_login',
        'page_title',
        'pause_after_scrolling_started',
        'pause_after_scrolling_finished',
        'pause_after_work_with_profile_started',
        'pause_after_work_with_profile_finished'
    ];
}
