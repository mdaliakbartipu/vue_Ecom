<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\Page;
use App\Tags;
use View;

class FrontController extends Controller
{
    public function __construct()
    {
        // Sharing Pages Data
        $this->cat = Category::all();
        $this->company = Company::first();

        if(!$this->cat){
            die("Please configure your Database");
        }

        foreach($this->cat as $this->category){
            $this->subCat[$this->category->id] = SubCategory::getAllsubcat($this->category->id);
                   
            foreach($this->subCat[$this->category->id] as $this->subCategory){
                $this->subSubCat[$this->subCategory->id] = SubSubCategory::getAllSubSubCat($this->subCategory->id);
            }
         }

         View::share('company', $this->company );
         View::share('cats', $this->cat );
         View::share('subCats', $this->subCat );
         View::share('subSubCats', $this->subSubCat );
         View::share('tags', Tags::forPage() );
         View::share('pages', Page::all() );

        //  Sharing User
        view()->share('signedIn', \Auth::check());
        view()->share('user', \Auth::user());


    }
}
