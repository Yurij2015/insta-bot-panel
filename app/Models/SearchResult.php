<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult whereHashtags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult whereInformModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult whereKeyWord($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult wherePlaces($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult whereRankToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult whereSeeMore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchResult whereUsers($value)
 * @mixin \Eloquent
 */
class SearchResult extends Model
{
    use HasFactory;
}
