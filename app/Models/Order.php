<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'shipping_address' => 'array',
        'billing_address' => 'array',
    ];
    protected $fillable = [
        'invoice_id',
        'customer_id',
        'status',

        'subtotal',
        'tax_total',
        'discount_total',
        'delivery_total',
        'grand_total',

        'payment_method',
        'payment_status',

        'shipping_address',
        'billing_address',

        'order_type',
        'notes',
        'carrier',
        'awb',
        'courier_shipment_id',
        'status',
        'shipment_status',
        'shipment_message',
        'shipment_response',
    ];
    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class, 'order_id');
    }
    public function items()
    {
        return $this->hasMany(\App\Models\OrderItem::class, 'order_id');
    }
       public function user()
    {
        // if your customers are stored in users table and FK is 'user_id'
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }
    
}
