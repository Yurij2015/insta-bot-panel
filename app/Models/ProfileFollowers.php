<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProfileFollowers
 *
 * @property int $id
 * @property int|null $profile_id
 * @property string|null $fbid_v2
 * @property string|null $pk
 * @property string|null $pk_id
 * @property string|null $strong_id__
 * @property string|null $full_name
 * @property int|null $is_private
 * @property int|null $third_party_downloads_enabled
 * @property int|null $has_anonymous_profile_picture
 * @property string|null $username
 * @property int|null $is_verified
 * @property string|null $profile_pic_id
 * @property string|null $profile_pic_url
 * @property array|null $account_badges
 * @property int|null $is_possible_scammer
 * @property array|null $is_possible_bad_actor
 * @property int|null $latest_reel_media
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProfileFollowers newModelQuery()
 * @method static Builder|ProfileFollowers newQuery()
 * @method static Builder|ProfileFollowers query()
 * @method static Builder|ProfileFollowers whereAccountBadges($value)
 * @method static Builder|ProfileFollowers whereCreatedAt($value)
 * @method static Builder|ProfileFollowers whereFbidV2($value)
 * @method static Builder|ProfileFollowers whereFullName($value)
 * @method static Builder|ProfileFollowers whereHasAnonymousProfilePicture($value)
 * @method static Builder|ProfileFollowers whereId($value)
 * @method static Builder|ProfileFollowers whereIsPossibleBadActor($value)
 * @method static Builder|ProfileFollowers whereIsPossibleScammer($value)
 * @method static Builder|ProfileFollowers whereIsPrivate($value)
 * @method static Builder|ProfileFollowers whereIsVerified($value)
 * @method static Builder|ProfileFollowers whereLatestReelMedia($value)
 * @method static Builder|ProfileFollowers wherePk($value)
 * @method static Builder|ProfileFollowers wherePkId($value)
 * @method static Builder|ProfileFollowers whereProfileId($value)
 * @method static Builder|ProfileFollowers whereProfilePicId($value)
 * @method static Builder|ProfileFollowers whereProfilePicUrl($value)
 * @method static Builder|ProfileFollowers whereStrongId($value)
 * @method static Builder|ProfileFollowers whereThirdPartyDownloadsEnabled($value)
 * @method static Builder|ProfileFollowers whereUpdatedAt($value)
 * @method static Builder|ProfileFollowers whereUsername($value)
 * @mixin Eloquent
 */
class ProfileFollowers extends Model
{
    protected $fillable = [
        'profile_id',
        'fbid_v2',
        'pk',
        'pk_id',
        'strong_id__',
        'full_name',
        'is_private',
        'third_party_downloads_enabled',
        'has_anonymous_profile_picture',
        'username',
        'is_verified',
        'profile_pic_id',
        'profile_pic_url',
        'account_badges',
        'is_possible_scammer',
        'is_possible_bad_actor',
        'latest_reel_media',
    ];

    protected $casts = [
        'account_badges' => 'array',
        'is_possible_bad_actor' => 'array',
    ];

    public function igUsers(): BelongsToMany
    {
        return $this->belongsToMany(IgUser::class, 'user_follower', 'profile_follower_id', 'ig_user_id');
    }

    public function profileInfo(): BelongsToMany
    {
        return $this->belongsToMany(ProfileInfo::class, 'list_user_follower', 'profile_follower_id', 'profile_id');
    }
}
