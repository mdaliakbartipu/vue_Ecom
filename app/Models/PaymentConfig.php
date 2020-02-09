<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PaymentConfig extends Model
{
    protected $table = 'payment_config';
    protected $fillable = ['host', 'store_id','store_password','api_url'];
}
