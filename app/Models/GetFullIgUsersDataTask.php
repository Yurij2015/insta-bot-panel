<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\GetFullIgUsersDataTask
 *
 * @property int $id
 * @property int $search_result_id
 * @property string|null $status acitve, completed
 * @property string|null $task_status active, running, completed, error
 * @property string|null $task_started_at
 * @property string|null $task_stoped_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|GetFullIgUsersDataTask newModelQuery()
 * @method static Builder|GetFullIgUsersDataTask newQuery()
 * @method static Builder|GetFullIgUsersDataTask query()
 * @method static Builder|GetFullIgUsersDataTask whereCreatedAt($value)
 * @method static Builder|GetFullIgUsersDataTask whereId($value)
 * @method static Builder|GetFullIgUsersDataTask whereSearchResultId($value)
 * @method static Builder|GetFullIgUsersDataTask whereStatus($value)
 * @method static Builder|GetFullIgUsersDataTask whereTaskStartedAt($value)
 * @method static Builder|GetFullIgUsersDataTask whereTaskStatus($value)
 * @method static Builder|GetFullIgUsersDataTask whereTaskStopedAt($value)
 * @method static Builder|GetFullIgUsersDataTask whereUpdatedAt($value)
 * @mixin Eloquent
 */
class GetFullIgUsersDataTask extends Model
{
    protected $fillable = [
        'search_result_id', 'status', 'task_status', 'task_started_at', 'task_stoped_at'
    ];
}
