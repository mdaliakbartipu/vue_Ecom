<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Front\FrontController;
use App\Models\Front\UI;

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
            'cats'          => $this->cat,
            'subCats'       => $this->subCat,
            'subSubCats'    => $this->subSubCat,
            'sliders'       => UI::getAll(),
            'banners'       => UI::getAllBanners(),
            'promotions'    => UI::getAllPromotions(),
            'blogs'         => UI::getThreeBlogs(),
            'testimonials'  => UI::getTestimonials()
        ]);
    }


    public function catagoryProducts()
    {
        return view('front.catagoryProducts',
        [
            'cats' => $this->cat,
            'subCats' => $this->subCat,
            'subSubCats' => $this->subSubCat,
        ]);
    }

    public function singleProduct()
    {
        return view('front.singleProduct',
        [
            'cats' => $this->cat,
            'subCats' => $this->subCat,
            'subSubCats' => $this->subSubCat
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
}
