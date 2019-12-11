<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Front\FrontController;
use App\Models\Front\UI;
use App\Page;
use App\Tags;

class PagesController extends FrontController
{
    public function __construct(){
        // By constructing parent we are geeting menues variables (cat subcat susubcat..see parent)
        parent::__construct();
    }

    public function index()
    { 

        return view('front.index',
        [   
            'company'               => $this->company,
            'cats'                         => $this->cat,
            'subCats'                 => $this->subCat,
            'subSubCats'          => $this->subSubCat,
            'sliders'                    => UI::getAll(),
            'banners'                 => UI::getAllBanners(),
            'promotions'          => UI::getAllPromotions(),
            'blogs'                      => UI::getThreeBlogs(),
            'testimonials'         => UI::getTestimonials(),
            'tags'                         => Tags::forPage(),
            'pages'                      => Page::all(), 
        ]);
    }


    public function catagoryProducts( $id = null)
    {

        return view('front.catagoryProducts',
        [
            'company'  => $this->company,
            'cats' => $this->cat,
            'subCats' => $this->subCat,
            'subSubCats' => $this->subSubCat,
            'tags'                         => Tags::forPage(),
            'pages'                      => Page::all(), 
        ]);
    }

    public function subcatProducts( $id = null)
    {

        return view('front.catagoryProducts',
        [
            'company'  => $this->company,
            'cats' => $this->cat,
            'subCats' => $this->subCat,
            'subSubCats' => $this->subSubCat,
            'tags'                         => Tags::forPage(),
            'pages'                      => Page::all(), 
            'tags'                         => Tags::forPage(),
            'pages'                      => Page::all(), 
        ]);
    }

    public function subsubcatProducts( $id = null)
    {

        return view('front.catagoryProducts',
        [
            'company'  => $this->company,
            'cats' => $this->cat,
            'subCats' => $this->subCat,
            'subSubCats' => $this->subSubCat,
            'tags'                         => Tags::forPage(),
            'pages'                      => Page::all(), 
        ]);
    }

    public function singleProduct()
    {
        return view('front.singleProduct',
        [
            'company'  => $this->company,
            'cats' => $this->cat,
            'subCats' => $this->subCat,
            'subSubCats' => $this->subSubCat,
            'tags'                         => Tags::forPage(),
            'pages'                      => Page::all(), 
        ]);

    }

    public function cart()
    {
        return view('front.cart');
    }
    
    public function checkout()
    {
        return view('front.checkout');
    }

    public function about()
    {
        return view('front.about', [
            'company'       => $this->company,
            'cats'                 => $this->cat,
            'subCats'                 => $this->subCat,
            'subSubCats'                 => $this->subSubCat,
            'tags'                         => Tags::forPage(),
            'pages'                      => Page::all(), 
        ]);
    }


    public function contact()
    {
        return view('front.contact', [
            'company'       => $this->company,
            'cats'                 => $this->cat,
            'subCats'                 => $this->subCat,
            'subSubCats'                 => $this->subSubCat,
            'tags'                         => Tags::forPage(),
            'pages'                      => Page::all(), 
        ]);
    }

    public function pages(string $slug)
    {
        
        $pageContent = Page::where('slug', $slug)->first();
        
        return view('front.pages', [
            'company'                => $this->company,
            'cats'                          => $this->cat,
            'subCats'                  => $this->subCat,
            'subSubCats'           => $this->subSubCat,
            'tags'                         => Tags::forPage(),
            'pages'                      => Page::all(), 
            'pageContent'       => $pageContent,
            'slug'                         => $slug,
        ]);

    }


}
