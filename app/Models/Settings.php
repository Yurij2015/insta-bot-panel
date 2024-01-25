<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Settings
 *
 * @property int $id
 * @property string|null $lower_limit_task lower limit of the pause between tasks
 * @property string|null $upper_limit_task upper limit of the pause between tasks
 * @property string|null $lower_limit_profile_activity lower limit of the pause between profile activity
 * @property string|null $upper_limit_profile_acitvity upper limit of the pause between profile activity
 * @property string|null $lower_limit_processed_profiles lower limit of the pause between processed profiles
 * @property string|null $upper_limit_processed_profiles upper limit of the pause between processed profiles
 * @property string|null $lower_limit_operations_number lower limit of the pause between operations number
 * @property string|null $upper_limit_operations_number upper limit of the pause between operations number
 * @property string|null $lower_limit_followers lower limit of the pause between followers
 * @property string|null $upper_limit_followers upper limit of the pause between followers
 * @property string|null $lower_limit_followings lower limit of the pause between followings
 * @property string|null $upper_limit_followings upper limit of the pause between followings
 * @property string|null $lower_limit_likes lower limit of the pause between likes
 * @property string|null $upper_limit_likes upper limit of the pause between likes
 * @property string|null $lower_limit_unfollows lower limit of the pause between unfollows
 * @property string|null $upper_limit_unfollows upper limit of the pause between unfollows
 * @property string|null $lower_limit_comments lower limit of the pause between comments
 * @property string|null $upper_limit_comments upper limit of the pause between comments
 * @property string|null $host_for_browser_work host for the browser to work
 * @property array|null $profiles_for_work profiles for work
 * @property string|null $start_cron_task_time
 * @property string|null $task_status
 * @property string|null $current_task
 * @property string|null $current_profile
 * @property array|null $task_types_for_profiles
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Settings newModelQuery()
 * @method static Builder|Settings newQuery()
 * @method static Builder|Settings query()
 * @method static Builder|Settings whereCreatedAt($value)
 * @method static Builder|Settings whereCurrentProfile($value)
 * @method static Builder|Settings whereCurrentTask($value)
 * @method static Builder|Settings whereHostForBrowserWork($value)
 * @method static Builder|Settings whereId($value)
 * @method static Builder|Settings whereLowerLimitComments($value)
 * @method static Builder|Settings whereLowerLimitFollowers($value)
 * @method static Builder|Settings whereLowerLimitFollowings($value)
 * @method static Builder|Settings whereLowerLimitLikes($value)
 * @method static Builder|Settings whereLowerLimitOperationsNumber($value)
 * @method static Builder|Settings whereLowerLimitProcessedProfiles($value)
 * @method static Builder|Settings whereLowerLimitProfileActivity($value)
 * @method static Builder|Settings whereLowerLimitTask($value)
 * @method static Builder|Settings whereLowerLimitUnfollows($value)
 * @method static Builder|Settings whereProfilesForWork($value)
 * @method static Builder|Settings whereStartCronTaskTime($value)
 * @method static Builder|Settings whereTaskStatus($value)
 * @method static Builder|Settings whereTaskTypesForProfiles($value)
 * @method static Builder|Settings whereUpdatedAt($value)
 * @method static Builder|Settings whereUpperLimitComments($value)
 * @method static Builder|Settings whereUpperLimitFollowers($value)
 * @method static Builder|Settings whereUpperLimitFollowings($value)
 * @method static Builder|Settings whereUpperLimitLikes($value)
 * @method static Builder|Settings whereUpperLimitOperationsNumber($value)
 * @method static Builder|Settings whereUpperLimitProcessedProfiles($value)
 * @method static Builder|Settings whereUpperLimitProfileAcitvity($value)
 * @method static Builder|Settings whereUpperLimitTask($value)
 * @method static Builder|Settings whereUpperLimitUnfollows($value)
 * @property string|null $upper_limit_profile_activity upper limit of the pause between profile activity
 * @property string|null $lower_limit_likes_for_profile
 * @property string|null $upper_limit_likes_for_profile
 * @property string|null $lower_limit_unfollows_for_profile
 * @property string|null $upper_limit_unfollows_for_profile
 * @property string|null $lower_limit_comments_for_profile
 * @property string|null $upper_limit_comments_for_profile
 * @property string|null $lower_limit_follows_for_profile
 * @property string|null $upper_limit_follows_for_profile
 * @property string|null $lower_limit_followings_for_profile
 * @property string|null $upper_limit_followings_for_profile
 * @property string|null $lower_limit_parsed_accs_for_profile
 * @property string|null $upper_limit_parsed_accs_for_profile
 * @property string|null $settings_status
 * @method static Builder|Settings whereLowerLimitCommentsForProfile($value)
 * @method static Builder|Settings whereLowerLimitFollowingsForProfile($value)
 * @method static Builder|Settings whereLowerLimitFollowsForProfile($value)
 * @method static Builder|Settings whereLowerLimitLikesForProfile($value)
 * @method static Builder|Settings whereLowerLimitParsedAccsForProfile($value)
 * @method static Builder|Settings whereLowerLimitUnfollowsForProfile($value)
 * @method static Builder|Settings whereSettingsStatus($value)
 * @method static Builder|Settings whereUpperLimitCommentsForProfile($value)
 * @method static Builder|Settings whereUpperLimitFollowingsForProfile($value)
 * @method static Builder|Settings whereUpperLimitFollowsForProfile($value)
 * @method static Builder|Settings whereUpperLimitLikesForProfile($value)
 * @method static Builder|Settings whereUpperLimitParsedAccsForProfile($value)
 * @method static Builder|Settings whereUpperLimitProfileActivity($value)
 * @method static Builder|Settings whereUpperLimitUnfollowsForProfile($value)
 * @mixin Eloquent
 */
class Settings extends Model
{
    protected $fillable = [
        'lower_limit_task',
        'upper_limit_task',
        'lower_limit_profile_activity',
        'upper_limit_profile_activity',
        'lower_limit_processed_profiles',
        'upper_limit_processed_profiles',
        'lower_limit_operations_number',
        'upper_limit_operations_number',
        'lower_limit_followers',
        'upper_limit_followers',
        'lower_limit_followings',
        'upper_limit_followings',
        'lower_limit_likes',
        'upper_limit_likes',
        'lower_limit_unfollows',
        'upper_limit_unfollows',
        'lower_limit_comments',
        'upper_limit_comments',
        'lower_limit_likes_for_profile',
        'upper_limit_likes_for_profile',
        'lower_limit_unfollows_for_profile',
        'upper_limit_unfollows_for_profile',
        'lower_limit_comments_for_profile',
        'upper_limit_comments_for_profile',
        'lower_limit_follows_for_profile',
        'upper_limit_follows_for_profile',
        'lower_limit_followings_for_profile',
        'upper_limit_followings_for_profile',
        'lower_limit_parsed_accs_for_profile',
        'upper_limit_parsed_accs_for_profile',
        'host_for_browser_work',
        'profiles_for_work',
        'start_cron_task_time',
        'task_status',
        'current_task',
        'current_profile',
        'task_types_for_profiles',
        'settings_status',
    ];

    protected $casts = [
        'profiles_for_work' => 'array',
        'task_types_for_profiles' => 'array',
    ];
}
