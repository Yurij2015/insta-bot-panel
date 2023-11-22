<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCookie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFbDtsg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereProxyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereRawData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUsername($value)
 * @mixin Eloquent
 */
class Profile extends Model
{
    protected $fillable = [
        'username', 'password', 'token', 'cookie', 'fb_dtsg',  'user_agent', 'proxy_id', 'raw_data'
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
