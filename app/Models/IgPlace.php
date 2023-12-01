<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\IgPlace
 *
 * @property int $id
 * @property array|null $location
 * @property string|null $subtitle
 * @property string|null $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|IgPlace newModelQuery()
 * @method static Builder|IgPlace newQuery()
 * @method static Builder|IgPlace query()
 * @method static Builder|IgPlace whereCreatedAt($value)
 * @method static Builder|IgPlace whereId($value)
 * @method static Builder|IgPlace whereLocation($value)
 * @method static Builder|IgPlace whereSubtitle($value)
 * @method static Builder|IgPlace whereTitle($value)
 * @method static Builder|IgPlace whereUpdatedAt($value)
 * @mixin Eloquent
 */
class IgPlace extends Model
{
    protected $fillable = [
        'search_result_id', 'location', 'subtitle', 'title'
    ];

    protected $casts = [
        'location' => 'array'
    ];
}
