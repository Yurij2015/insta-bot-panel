<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Profile
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string|null $cookie
 * @property string|null $token token for facebook api
 * @property string|null $fb_dtsg
 * @property string|null $user_agent
 * @property int|null $proxy_id
 * @property string|null $raw_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Profile newModelQuery()
 * @method static Builder|Profile newQuery()
 * @method static Builder|Profile query()
 * @method static Builder|Profile whereCookie($value)
 * @method static Builder|Profile whereCreatedAt($value)
 * @method static Builder|Profile whereFbDtsg($value)
 * @method static Builder|Profile whereId($value)
 * @method static Builder|Profile wherePassword($value)
 * @method static Builder|Profile whereProxyId($value)
 * @method static Builder|Profile whereRawData($value)
 * @method static Builder|Profile whereToken($value)
 * @method static Builder|Profile whereUpdatedAt($value)
 * @method static Builder|Profile whereUserAgent($value)
 * @method static Builder|Profile whereUsername($value)
 * @property int|null $email
 * @property int|null $fullName
 * @property int|null $is_registered
 * @property-read PersonalProfileData|null $profileData
 * @property-read Proxy|null $proxy
 * @method static Builder|Profile whereEmail($value)
 * @method static Builder|Profile whereFullName($value)
 * @method static Builder|Profile whereIsRegistered($value)
 * @mixin Eloquent
 */
class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'email', 'phone_number', 'fullName', 'username', 'password', 'token', 'cookie', 'fb_dtsg',  'user_agent', 'proxy_id', 'status', 'raw_data', 'is_registered'
    ];

    public function proxy(): BelongsTo
    {
        return $this->belongsTo(Proxy::class);
    }

    public function profileData(): HasOne
    {
        return $this->hasOne(PersonalProfileData::class, 'username', 'username');
    }
}
