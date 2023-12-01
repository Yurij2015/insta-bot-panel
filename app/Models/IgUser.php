<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\IgUser
 *
 * @property int $id
 * @property string|null $username
 * @property int|null $is_verified
 * @property string|null $full_name
 * @property string|null $search_social_context
 * @property int|null $unseen_count
 * @property string|null $pk
 * @property string|null $live_broadcast_visibility
 * @property string|null $live_broadcast_id
 * @property int|null $latest_reel_media
 * @property int|null $seen
 * @property string|null $profile_pic_url
 * @property int|null $is_unpublished
 * @property string|null $ig_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|IgUser newModelQuery()
 * @method static Builder|IgUser newQuery()
 * @method static Builder|IgUser query()
 * @method static Builder|IgUser whereCreatedAt($value)
 * @method static Builder|IgUser whereFullName($value)
 * @method static Builder|IgUser whereId($value)
 * @method static Builder|IgUser whereIgId($value)
 * @method static Builder|IgUser whereIsUnpublished($value)
 * @method static Builder|IgUser whereIsVerified($value)
 * @method static Builder|IgUser whereLatestReelMedia($value)
 * @method static Builder|IgUser whereLiveBroadcastId($value)
 * @method static Builder|IgUser whereLiveBroadcastVisibility($value)
 * @method static Builder|IgUser wherePk($value)
 * @method static Builder|IgUser whereProfilePicUrl($value)
 * @method static Builder|IgUser whereSearchSocialContext($value)
 * @method static Builder|IgUser whereSeen($value)
 * @method static Builder|IgUser whereUnseenCount($value)
 * @method static Builder|IgUser whereUpdatedAt($value)
 * @method static Builder|IgUser whereUsername($value)
 * @mixin Eloquent
 */
class IgUser extends Model
{
    protected $fillable = [
        'search_result_id',
        'username',
        'is_verified',
        'full_name',
        'search_social_context',
        'unseen_count',
        'pk',
        'live_broadcast_visibility',
        'live_broadcast_id',
        'latest_reel_media',
        'seen',
        'profile_pic_url',
        'is_unpublished',
        'ig_id'
    ];
}
