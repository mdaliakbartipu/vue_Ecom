<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    protected $table = 'product_sell';
    protected $fillable = ['product_id', 'variant_id', 'sell','order'];
}
