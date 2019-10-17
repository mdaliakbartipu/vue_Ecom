<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;

class Category extends Model
{
     public function subCategories()
    {
    	return $this->hasMany(SubCategory::class);
    }
   public function Products()
 {
    return $this->hasMany('App\Product', 'category_id');
  }


 
}
