<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','address','contact_person','contact_no','brand_id'];

    public function products()
    {
        return $this->belongsTo('App\product','products');
    }
}
