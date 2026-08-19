<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    protected $table = 'wishlist_items';

    protected $fillable = [
        'user_id',
        'product_variant_id',
    ];

    public function variant()
    {
        return $this->belongsTo(
            ProductVariant::class,
            'product_variant_id'
        );
    }
    public function customer()
    {
        return $this->belongsTo(
            Customer::class,
            'user_id'
        );
    }
}
