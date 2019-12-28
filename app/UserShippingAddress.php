<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserShippingAddress extends Model
{
    protected $table = 'user_shipping_address';
    protected $fillable= [
                'user_id',
                'first_name',
                'last_name',
                'country',
                'street',
                'address',
                'city',
                'state',
                'phone',
                'email'
    ];
}
