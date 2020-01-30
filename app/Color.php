<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $filleble = ['name', 'hex','rgb','pantone','image'];
    
    public function product(){
    	 return  $this->belongsToMany('App\Product', 'products');
    }
}
