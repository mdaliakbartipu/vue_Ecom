<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'billing_id',
        'shipping_id',
        'product_id',
        'variant_id',
        'qty',
        'unit_price',
        'shipping_cost',
        'vat',
        'discount',
        'payment_type',
        'payment_status',
        'trans_id'
    ];
}
