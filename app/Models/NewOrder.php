<?php

namespace App\Models;

class NewOrder extends Order
{
    protected $table = "new_orders";


    public function client()
    {
        return $this->belongsTo('App\UserProfile','user_id');
    }
}
