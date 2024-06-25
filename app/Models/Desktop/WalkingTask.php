<?php

namespace App\Models\Desktop;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkingTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'working_profile_id',
        'profiles_list',
        'status',
        'lower_delay_limit',
        'upper_delay_limit',
        'started_at',
        'completed_at'
    ];

    protected $casts = [
        'profiles_list' => 'array',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'working_profile_id');
    }
}

