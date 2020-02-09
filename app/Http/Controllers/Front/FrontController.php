<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Category;
use App\CommonInfo;
use App\SubCategory;
use App\SubSubCategory;
use App\Page;
use App\Tags;

use Illuminate\Support\Facades\View;
// use View;

class FrontController extends Controller
{
    public function __construct()
    {
        // Sharing Pages Data
        $this->cat = Category::all();
        $this->company = Company::first();

        if(!count($this->cat)){
            die("Please configure your Database, set categories");
        }

        foreach($this->cat as $this->category){
            $this->subCat[$this->category->id] = SubCategory::getAllsubcat($this->category->id);
            if(!count($this->subCat)){
                die("Please configure your Database, set sub categories");
            }          
        foreach($this->subCat[$this->category->id] as $this->subCategory){
            $this->subSubCat[$this->subCategory->id] = SubSubCategory::getAllSubSubCat($this->subCategory->id);
            if(!count($this->subSubCat)){
                die("Please configure your Database, set sub categories");
            }
        }
         }

         
         $commonInfo = CommonInfo::all();
         \View::share('company'          , $this->company );
         \View::share('cats'             , $this->cat );
         \View::share('subCats'          , $this->subCat );
         \View::share('subSubCats'       , $this->subSubCat );
         \View::share('tags'             , Tags::forPage() );
         \View::share('pages'            , Page::all() );
         \View::share('commonInfo'       , $commonInfo );

        //  Sharing User
        view()->share('signedIn', \Auth::check());
        
        if(\Auth::check()){
            view()->share('user', \Auth::user());
        }

        
        


    }
}
