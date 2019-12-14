<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Front\FrontController;
use App\Models\Front\UI;
use App\Page;
use App\ProductTags;
use App\Product;

class PagesController extends FrontController
{
    public function __construct(){
        // By constructing parent we are geeting menues variables (cat subcat susubcat..see parent)
        parent::__construct();
    }

    public function index()
    {   
        $productTags = ProductTags::all();
        $products = array();

        if($productTags):
            foreach($productTags as $ptag):
                // dd($ptag);
                $products[] = Product::find($ptag->product_id);
            endforeach;
        endif;

        return view('front.index',
        [   
            'sliders'              => UI::getAll(),
            'banners'              => UI::getAllBanners(),
            'promotions'           => UI::getAllPromotions(),
            'blogs'                => UI::getThreeBlogs(),
            'testimonials'         => UI::getTestimonials(),
            'products'             => $products,
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
        // dd("asa");
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
