<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'email',
        'rating',
        'title',
        'review',
        'image',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function averageRating()
    {
        return round($this->reviews()->avg('rating') ?? 0, 1);
    }

    public function totalReviews()
    {
        return $this->reviews()->count();
    }
}
