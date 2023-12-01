<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\IgHashtag
 *
 * @property int $id
 * @property int|null $ig_id
 * @property string|null $name
 * @property int|null $media_count
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|IgHashtag newModelQuery()
 * @method static Builder|IgHashtag newQuery()
 * @method static Builder|IgHashtag query()
 * @method static Builder|IgHashtag whereCreatedAt($value)
 * @method static Builder|IgHashtag whereId($value)
 * @method static Builder|IgHashtag whereIgId($value)
 * @method static Builder|IgHashtag whereMediaCount($value)
 * @method static Builder|IgHashtag whereName($value)
 * @method static Builder|IgHashtag whereUpdatedAt($value)
 * @mixin Eloquent
 */
class IgHashtag extends Model
{
    protected $fillable = [
        'search_result_id', 'ig_id', 'name', 'media_count'
    ];
}
