<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\GetProfilesDataFromListTask
 *
 * @property int $id
 * @property string $personal_profile_to_work
 * @property int|null $profile_list_id
 * @property string|null $status acitve, completed
 * @property string|null $task_status active, running, completed, error
 * @property string|null $task_started_at
 * @property string|null $task_stoped_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|GetProfilesDataFromListTask newModelQuery()
 * @method static Builder|GetProfilesDataFromListTask newQuery()
 * @method static Builder|GetProfilesDataFromListTask query()
 * @method static Builder|GetProfilesDataFromListTask whereCreatedAt($value)
 * @method static Builder|GetProfilesDataFromListTask whereId($value)
 * @method static Builder|GetProfilesDataFromListTask wherePersonalProfileToWork($value)
 * @method static Builder|GetProfilesDataFromListTask whereProfileListId($value)
 * @method static Builder|GetProfilesDataFromListTask whereStatus($value)
 * @method static Builder|GetProfilesDataFromListTask whereTaskStartedAt($value)
 * @method static Builder|GetProfilesDataFromListTask whereTaskStatus($value)
 * @method static Builder|GetProfilesDataFromListTask whereTaskStopedAt($value)
 * @method static Builder|GetProfilesDataFromListTask whereUpdatedAt($value)
 * @mixin Eloquent
 */
class GetProfilesDataFromListTask extends Model
{
    protected $fillable = [
        'personal_profile_to_work', 'profile_list_id', 'status', 'task_status', 'task_started_at', 'task_stoped_at'
    ];
}
