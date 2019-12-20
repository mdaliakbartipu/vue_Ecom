<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubSubCategory extends Model
{
    protected $fillable = ['sub_category_id' , 'name'];
    
    public function sub_cateroy(){
    	return $this->belongsTo(SubCategory::class);
    }

    public static function getAllSubSubCat(int $subCatID){
        $subSubCat = DB::table('sub_sub_categories')->where('sub_category_id', $subCatID)->get();
        return $subSubCat;
    }
    public function Products()
  {
    return $this->hasMany('App\Product', 'super');
  }
}
