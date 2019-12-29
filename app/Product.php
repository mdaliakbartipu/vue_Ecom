<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(Category::class,'cat');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'sub');
    }
     public function subsubcats(){
        return $this->belongsTo(SubSubCategory::class,'super');
    }
    
    public function color(){
    	return $this->belongsTo(Color::class);
    }

    public function sizes(){
    	 return  $this->belongsTo(Size::class);
    }

    public function sleeves(){
    	 return  $this->belongsTo(Sleeve::class);
    }

    public function leglenghts(){
    	 return  $this->belongsTo(LegLength::class);
    }
    public function fits(){
    	 return  $this->belongsTo(Fit::class);
    }

    public function brandName()
    {
        return  Brand::where('id', $this->brand)->first();
    }

    public function variants()
    {
        return  $this->hasMany(ProductVariant::class);
    }
    public function brandInfo()
    {
        return  $this->belongsTo(Brand::class, 'brand');
    }
}
