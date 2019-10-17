<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }
     public function subsubcats(){
        return $this->belongsTo(subSubCategory::class);
    }
    
    public function color(){
    	return $this->belongsTo(Color::class);
    }

    public function sizes(){
    	 return  $this->belongsTo(Size::class);
    }

    public function sleeves(){
    	 return  $this->belongsTo(sleeve::class);
    }

    public function leglenghts(){
    	 return  $this->belongsTo(legLength::class);
    }
    public function fits(){
    	 return  $this->belongsTo(fit::class);
    }
}
