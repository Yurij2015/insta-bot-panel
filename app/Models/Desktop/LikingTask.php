<?php

namespace App\Models\Desktop;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LikingTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'working_profile_id',
        'profiles_list',
        'status',
        'lower_delay_limit',
        'upper_delay_limit',
        'count_of_screen_scroll',
        'lower_limit_of_followers',
        'upper_limit_of_followers',
        'is_private',
        'is_business',
        'is_professional',
        'has_avatar',
        'has_posts',
        'has_stories',
        'has_url',
        'has_phone',
        'has_business_category_name',
        'has_category_name',
        'category_name',
        'has_bio',
        'lower_posts_limit',
        'lower_stories_limit',
        'started_at',
        'completed_at'
    ];

    protected $casts = [
        'profiles_list' => 'array',
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'working_profile_id');
    }
}
