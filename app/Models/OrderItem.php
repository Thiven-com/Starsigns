<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_variant_id',
        'seller_id',

        'product_title',
        'sku',

        'unit_price',
        'quantity',
        'subtotal',

        'weight',
    ];
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // ADD THIS
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}
