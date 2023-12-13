<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\GetFollowersTask
 *
 * @property int $id
 * @property int $profile_id
 * @property int $search_result_id
 * @property string $personal_profile_username
 * @property string|null $status acitve, completed
 * @property string|null $task_status active, running, completed, error
 * @property string|null $task_started_at
 * @property string|null $task_stoped_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|GetFollowersTask newModelQuery()
 * @method static Builder|GetFollowersTask newQuery()
 * @method static Builder|GetFollowersTask query()
 * @method static Builder|GetFollowersTask whereCreatedAt($value)
 * @method static Builder|GetFollowersTask whereId($value)
 * @method static Builder|GetFollowersTask wherePersonalProfileUsername($value)
 * @method static Builder|GetFollowersTask whereProfileId($value)
 * @method static Builder|GetFollowersTask whereSearchResultId($value)
 * @method static Builder|GetFollowersTask whereStatus($value)
 * @method static Builder|GetFollowersTask whereTaskStartedAt($value)
 * @method static Builder|GetFollowersTask whereTaskStatus($value)
 * @method static Builder|GetFollowersTask whereTaskStopedAt($value)
 * @method static Builder|GetFollowersTask whereUpdatedAt($value)
 * @mixin Eloquent
 */
class GetFollowersTask extends Model
{
    protected $fillable = [
        'profile_id', 'search_result_id', 'personal_profile_username', 'status', 'task_status', 'task_started_at', 'task_stoped_at'
    ];
}
