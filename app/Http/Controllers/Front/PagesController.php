<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Front\FrontController;
use App\Models\Front\UI;
use App\Page;
use App\ProductTags;
use App\Product;
use App\ProductImages;
use App\ProductVariant;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\Color;
use App\Size;
use App\Brand;
use Illuminate\Http\Request;
use Session;


class PagesController extends FrontController
{
    public function __construct(){
        // By constructing parent we are geeting menues variables (cat subcat susubcat..see parent)
        parent::__construct();
    }

    public function index()
    {   
        // $p = Product::with('brandName')->get();
        // foreach($p as $a){
        //     dd($a->brandName->name);
        // }
        return view('front.index',
        [   
            'sliders'              => UI::getAll(),
            'banners'              => UI::getAllBanners(),
            'promotions'           => UI::getAllPromotions(),
            'blogs'                => UI::getThreeBlogs(),
            'testimonials'         => UI::getTestimonials(),
            
        ]);
    }


    public function cat( $slug = null)
    {
        $section = Category::where('slug', (string)$slug)->with('products')->first();
    
        return view('front.catagoryProducts',[
            'section' => $section,
            'colors'   => Color::get(),
            'sizes'     => Size::get(),
            'brands'     => Brand::get()
            ]);
    }

    public function sub( $slug = null)
    {
        $section = SubCategory::where('slug', (string)$slug)->with('products')->first();
    
        return view('front.catagoryProducts',[
            'section' => $section,
            'colors'   => Color::get(),
            'sizes'     => Size::get(),
            'brands'     => Brand::get()
            ]);
    }

    public function super( $slug = null)
    {
        $section = SubSubCategory::where('slug', (string)$slug)->with('products')->first();
    
        return view('front.catagoryProducts',[
            'section' => $section,
            'colors'   => Color::get(),
            'sizes'     => Size::get(),
            'brands'   =>Brand::get()
            ]);
    }

    public function singleProduct($id)
    {
        return view('front.singleProduct',
        [
            'productID'=>$id
        ]);

    }

    public function get_product($id)
    {
        $product = Product::find($id);
        echo json_encode($product);
    }

    public function get_variant($id)
    {
        $product = ProductVariant::where('product_id',$id)->with('color')->with('size')->get()->keyBy('id')->groupBy('color_id');
        echo json_encode($product);
    }

   

    public function cart()
    {
        $carts = \Session::get('cart');
        
        if(!$carts){
            return redirect('/');
        }
       
        return view('front.cart', ['cartProducts' => $carts]);
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

    public function dashboard()
    {
        return view('front.dashboard', [
            
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
