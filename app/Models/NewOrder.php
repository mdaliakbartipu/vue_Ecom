<?php

namespace App\Models;

class NewOrder extends Order
{
    protected $table = "new_orders";


    public function client()
    {
        return $this->belongsTo('App\UserProfile','user_id');
    }

    public function shippingAddress()
    {
        return $this->belongsTo('App\UserShippingAddress','shipping_id');
    }
    public function billingAddress()
    {
        return $this->belongsTo('App\UserProfile','billing_id');
    }

    public function variant()
    {
        return $this->belongsTo('App\ProductVariant','variant_id')->with('product','color','size');
    }


}
