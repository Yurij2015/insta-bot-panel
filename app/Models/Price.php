<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'stripe_price_id',
        'product_id',
        'stripe_product_id',
        'currency',
        'unit_amount',
        'recurring',
        'status',
        'stripe_status',
    ];

    protected $casts = [
        'recurring' => 'array',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
