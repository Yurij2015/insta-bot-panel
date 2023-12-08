<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserAgent
 *
 * @property int $id
 * @property string $name
 * @property string $user_agent
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UserAgent newModelQuery()
 * @method static Builder|UserAgent newQuery()
 * @method static Builder|UserAgent query()
 * @method static Builder|UserAgent whereCreatedAt($value)
 * @method static Builder|UserAgent whereId($value)
 * @method static Builder|UserAgent whereName($value)
 * @method static Builder|UserAgent whereUpdatedAt($value)
 * @method static Builder|UserAgent whereUserAgent($value)
 * @mixin Eloquent
 */
class UserAgent extends Model
{
    protected $fillable = [
        'name', 'user_agent'
    ];
}
