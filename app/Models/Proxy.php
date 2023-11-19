<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy query()
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy whereProxy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Proxy extends Model
{
    protected $fillable = [
        'proxy', 'port', 'login', 'password'
    ];
}
