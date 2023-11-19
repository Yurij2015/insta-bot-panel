<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereAccountBadges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereFbidV2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereHasAnonymousProfilePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereIsPossibleBadActor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereIsPossibleScammer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereIsPrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereLatestReelMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers wherePk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers wherePkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereProfilePicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereProfilePicUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereStrongId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereThirdPartyDownloadsEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileFollowers whereUsername($value)
 * @mixin \Eloquent
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
}
