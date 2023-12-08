<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Proxy
 *
 * @property int $id
 * @property string $proxy
 * @property string $port
 * @property string|null $login
 * @property string|null $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Proxy newModelQuery()
 * @method static Builder|Proxy newQuery()
 * @method static Builder|Proxy query()
 * @method static Builder|Proxy whereCreatedAt($value)
 * @method static Builder|Proxy whereId($value)
 * @method static Builder|Proxy whereLogin($value)
 * @method static Builder|Proxy wherePassword($value)
 * @method static Builder|Proxy wherePort($value)
 * @method static Builder|Proxy whereProxy($value)
 * @method static Builder|Proxy whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Proxy extends Model
{
    protected $fillable = [
        'proxy', 'port', 'login', 'password'
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }
}
