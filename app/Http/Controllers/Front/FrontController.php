<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;


class FrontController extends Controller
{
    public function __construct()
    {
        //Getting all menues so that it can be available in all pages
        
        $this->cat = Category::all();
        if(!$this->cat){
            echo "Please configure your Database";
        }

        foreach($this->cat as $this->category){
            $this->subCat[$this->category->id] = SubCategory::getAllsubcat($this->category->id);
                   
            foreach($this->subCat[$this->category->id] as $this->subCategory){
                $this->subSubCat[$this->subCategory->id] = SubSubCategory::getAllSubSubCat($this->subCategory->id);
            }
         }
    }
}
