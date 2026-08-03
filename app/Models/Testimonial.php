<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    protected $table = 'testimonials';
    protected $fillable = [
        'name',
        'image',
        'rating',
        'date',
        'message',
        'status',
        'customer_id',
    ];
}
