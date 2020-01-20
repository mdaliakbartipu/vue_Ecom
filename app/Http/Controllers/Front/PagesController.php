<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\DB;
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
use App\Models\Blog;
use App\Http\Controllers\MailController;
use App\ProductAttribute;
use Illuminate\Http\Request;
use Session;


class PagesController extends FrontController
{
    public function __construct(){
        // By constructing parent we are geeting menues variables (cat subcat susubcat..see parent)
        parent::__construct();
    }


    public function testEmail()
    {
        return view('front.emails.order');
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

    public function blog(Blog $blog, $slug = null)
    {   
        return view('front.blogSingle')->withBlog(UI::getBlog($blog))->withRelatedBlogs(UI::getFourBlogsWithoutThis($blog));
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

    public function singleProduct($id, $slug)
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

        foreach($carts as &$item){
            // dd($item);
            $imageInfo = ProductImages::where('variant_id',$item['color_id'])->first();
            if($imageInfo){
                $item['image'] = $imageInfo->image;
            }
        }
       
        return view('front.cart', ['cartProducts' => $carts]);
    }
    
    public function checkout()
    {
        $carts = \Session::get('cart');
        
        if(!$carts){
            return redirect('/');
        }

        //get user info for automatic fillup
        $user  = \Auth::user()?\Auth::user()->id:null;
        if($user):
            $user = \App\User::with('profile')->find($user);
        endif;
        // dd($user);

        return view('front.checkout',[
                    'cartProducts' => $carts,
                    'user'         => $user
                ]);
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
        if(!\Auth::user())
            return redirect('/');

        $user = \App\User::where('id',\Auth::user()->id)->with('profile')->first();
        // dd($user);
        $orders = \App\Models\NewOrder::where('user_id', $user->id)->get();
        // dd($orders);
        return view('front.dashboard', [
            'user' => $user,
            'orders' => $orders
        ]);
    }

    public function pages(string $slug)
    {    
 
        return view('front.pages', [
            'pageContent'       => Page::dataBySlug($slug),
            'slug'              => $slug,
        ]);

    }


    // api section
    // to be seperated to seperated file
    public function getContactInfo()
    {
        $info = \DB::table('company')->first();
        if( $info){
            return json_encode(['status'=>200, 'data'=>$info]);
        } else {
            return json_encode(['status'=>404, 'msg'=>"No data found"]);
        }
    }

    public function submitForm(Request $request)    
    {   

  


        $mail = new MailController();   

        $send = $mail->contactMail($request);

        if($send){
            return json_encode(['status'=>200, 'msg'=>'Your message is sent']);
        } else {
            return json_encode(['status'=>502, 'msg'=> 'Something wnet wrong and message wasn\'t sent']);
        }
    }

    public function getAttributes(Request $request)
    {
        $colors = Color::all();
        $sizes = Size::all();

        if(!empty($colors) && !empty($sizes)){
            return json_encode(['status'=>200, 'msg'=>'Your query is completed', 'colors'=>$colors, 'sizes'=>$sizes]);
        } else {
            return json_encode(['status'=>404, 'msg'=>'No attributes found']);
        }
    }

    
    public function test(Request $request)    
    {   

        if(!isset($request->image)){
            return json_encode(['status'=>502, 'msg'=> 'I got no image!!!']); 
        }

        // dd($request->all());
        $image = (string)$request->image;
        $bigPath = 'front/assets/.uploads/products/';
        $smallPath = 'front/assets/.uploads/products/thumbs/';
        
        if(file_exists($bigPath.$image)){
            echo "yeah i got it!<br/>";
            if(!unlink($bigPath.$image)){
                // something went wrong when i tried to remove file
                return json_encode(['status'=>502, 'msg'=> 'something went wrong when i tried to remove file!']); 
            }
        } else {
            return json_encode(['status'=>502, 'msg'=> 'Believe me! I have no image(big) stored like that!!!']); 
        }

        if(file_exists($smallPath.$image)){
            echo "yeah i got it!<br/>";
            if(!unlink($smallPath.$image)){
                // something went wrong when i tried to remove file
                return json_encode(['status'=>502, 'msg'=> 'something went wrong when i tried to remove file!']); 
            }
        } else {
            return json_encode(['status'=>502, 'msg'=> 'Believe me! I have no image(small) stored like that!!!']); 
        }

        // remove from databse entry

        $imgDB = ProductImages::where('image', $image)->first();
        if($imgDB){
            
            if($imgDB->delete()){
                return json_encode(['status'=>200, 'msg'=> 'Congratz! Image deleted!']); 
            }

        } else {
            return json_encode(['status'=>502, 'msg'=> 'Believe me! Databse hasno image like that']); 
        }

        echo "working! Chill";        

        // $mail = new MailController();   
        // $send = $mail->contactMail($request);
        
        // if($send){
        //     return json_encode(['status'=>200, 'msg'=>'Your message is sent']);
        // } else {
        //     return json_encode(['status'=>502, 'msg'=> 'Something wnet wrong and message wasn\'t sent']);
        // }
        
    }

    public function paypalSuccess(Request $request)
    {
        return view('front.success');
    }

    public function paypalfails(Request $request)
    {
        return view('front.fails');
    }


}
