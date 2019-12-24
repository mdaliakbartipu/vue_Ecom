<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    // protected $table = 
    protected $fillable = ['product_id','attribute_id'];

    public function attribute()
    {
        return $this->belongsTo('\App\Attributes');
    }
}
