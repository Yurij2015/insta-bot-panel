<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProfileList
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $ig_username
 * @property string|null $profiles_list
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProfileList newModelQuery()
 * @method static Builder|ProfileList newQuery()
 * @method static Builder|ProfileList query()
 * @method static Builder|ProfileList whereCreatedAt($value)
 * @method static Builder|ProfileList whereDescription($value)
 * @method static Builder|ProfileList whereId($value)
 * @method static Builder|ProfileList whereIgUsername($value)
 * @method static Builder|ProfileList whereName($value)
 * @method static Builder|ProfileList whereProfilesList($value)
 * @method static Builder|ProfileList whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ProfileList extends Model
{
    protected $fillable = [
        'name', 'description', 'ig_username', 'profiles_list'
    ];

    public function profileInfo(): BelongsToMany
    {
        return $this->belongsToMany(ProfileInfo::class, 'igprofile_list', 'list_id', 'ig_profile_id');
    }

}
