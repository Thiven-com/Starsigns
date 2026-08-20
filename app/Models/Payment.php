<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $casts = [
        'paid_at' => 'datetime',
    ];
    protected $fillable = [
        'order_id',
        'user_id',

        'amount',
        'currency',

        'status',
        'method',
        'provider',

        'provider_order_id',
        'reference_no',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }    //
}
