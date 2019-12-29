<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonInfo extends Model
{
    protected $fillable = [
        'delivery_time',
         'shipping_and_return',
          'special_offer',
           'size_chart'
        ];
}
