<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\SearchResult
 *
 * @property int $id
 * @property string|null $key_word
 * @property string|null $see_more
 * @property string|null $inform_module
 * @property mixed|null $hashtags
 * @property mixed|null $places
 * @property mixed|null $users
 * @property string|null $rank_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|SearchResult newModelQuery()
 * @method static Builder|SearchResult newQuery()
 * @method static Builder|SearchResult query()
 * @method static Builder|SearchResult whereCreatedAt($value)
 * @method static Builder|SearchResult whereHashtags($value)
 * @method static Builder|SearchResult whereId($value)
 * @method static Builder|SearchResult whereInformModule($value)
 * @method static Builder|SearchResult whereKeyWord($value)
 * @method static Builder|SearchResult wherePlaces($value)
 * @method static Builder|SearchResult whereRankToken($value)
 * @method static Builder|SearchResult whereSeeMore($value)
 * @method static Builder|SearchResult whereUpdatedAt($value)
 * @method static Builder|SearchResult whereUsers($value)
 * @property int|null $ig_id
 * @property string|null $ig_username
 * @method static Builder|SearchResult whereIgId($value)
 * @method static Builder|SearchResult whereIgUsername($value)
 * @mixin Eloquent
 */
class SearchResult extends Model
{
    protected $fillable = [
        'ig_id', 'ig_username', 'key_word', 'see_more', 'inform_module', 'hashtags', 'places', 'users', 'rank_token'
    ];

    protected $casts = [
        'hashtags' => 'array',
        'places' => 'array',
        'users' => 'array'
    ];
}
