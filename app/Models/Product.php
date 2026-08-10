<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'category_id',
        'brand_id',
        'status',
        'type_id',
        'type',
        'rating',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    public function variant()
    {
        return $this->hasOne(ProductVariant::class)->oldest();
    }


    public function media()
    {
        return $this->hasMany(ProductMedia::class)->orderBy('sort_order');
    }
    public function images()
    {
        return $this->hasMany(ProductMedia::class)->orderBy('sort_order');
    }


    public function primaryMedia()
    {
        return $this->hasOne(ProductMedia::class)->where('is_primary', true)->ofMany('id', 'min');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function averageRating()
    {
        return round($this->reviews()->avg('rating') ?? 0, 1);
    }

    // ADD THIS METHOD
    public function totalReviews()
    {
        return $this->reviews()->count();
    }

}
