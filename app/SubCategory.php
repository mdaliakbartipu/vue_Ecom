<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\category;
use Illuminate\Support\Facades\DB;


class SubCategory extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
    	return $this->belongsTo(category::class);
    }
    public function sub_sub_categories(){
    	return $this->hasMany(subSubCategory::class);
    }

    public static function getAllSubCat(int $catID){
        $subCat = DB::table('sub_categories')->where('category_id', $catID)->get();
        return $subCat;
    }
}
