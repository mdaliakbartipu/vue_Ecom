<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Front\FrontController;
use App\Models\Front\UI;
use App\Page;

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
            'sliders'              => UI::getAll(),
            'banners'              => UI::getAllBanners(),
            'promotions'           => UI::getAllPromotions(),
            'blogs'                => UI::getThreeBlogs(),
            'testimonials'         => UI::getTestimonials(),
        ]);
    }


    public function catagoryProducts( $id = null)
    {
        return view('front.catagoryProducts',
        [

       ]);
    }

    public function subcatProducts( $id = null)
    {

        return view('front.catagoryProducts',
        [
            
            
        ]);
    }

    public function subsubcatProducts( $id = null)
    {

        return view('front.catagoryProducts',
        [
            
        ]);
    }

    public function singleProduct()
    {
        return view('front.singleProduct',
        [
            
         
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
           
        ]);
    }


    public function contact()
    {
        return view('front.contact', [
            
        ]);
    }

    public function pages(string $slug)
    {    
 
        return view('front.pages', [
            'pageContent'       => Page::dataBySlug($slug),
            'slug'              => $slug,
        ]);

    }


}
