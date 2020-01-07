<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AcceptedOrder;
use App\Models\ReturnedOrder;
use App\Models\CancelledOrder;
use App\Models\DeliveredOrder;


class Order extends Model
{
    protected $table = "new_orders";
    
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

    public function client()
    {
        return $this->belongsTo('App\UserProfile', 'user_id');
    }

    public function shippingAddress()
    {
        return $this->belongsTo('App\UserShippingAddress', 'shipping_id');
    }
    public function billingAddress()
    {
        return $this->belongsTo('App\UserProfile', 'billing_id');
    }

    public function variant()
    {
        return $this->belongsTo('App\ProductVariant', 'variant_id')->with('product', 'color', 'size');
    }


    // Single View

}
