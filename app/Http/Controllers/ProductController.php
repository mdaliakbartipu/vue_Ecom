<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\Color;
use App\Size;
use App\Attributes;
use App\ProductAttribute;
use App\Tags;
use App\ProductTags;
use App\Product;
use App\Brand;
use App\ProductImages;
use App\ProductStorage;
use App\ProductVariant;
use Carbon\Carbon;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ajaxGetSub(Request $request){
        $id = (int)$request['id'];
        $subcategories = SubCategory::where('category_id', '=', $id)->get();
        return json_encode($subcategories);
    }

    public function ajaxGetSubsub(Request $request){
        $id = (int)$request['id'];
        $subSubcategories = SubSubCategory::where('sub_category_id', '=', $id)->get();
        return json_encode($subSubcategories);
    }
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $subsubcats =  SubSubCategory::all();
        $colors = Color::all();
        $sizes = Size::all();
        $attributes = Attributes::all();
        $tags = Tags::forProduct();
        $brand = Brand::all();

        return view('product.create',compact('categories','subcategories','subsubcats','colors','sizes','attributes', 'tags', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //print_r($request->color);die();
          $this->validate($request,[
           'name'     => 'required',
           'pro_code' => 'required',
           'desc'     => 'required',
           'price'    => 'required',
           'brand'    => 'required',
           'discount' => 'required',
           'details'  => 'required',
           'category'  => 'required',
           'sub_category'  => 'required',
           'sub_sub_category'  => 'required'
        ]);
        
        // dd($request);
    // saving product
        $product = new Product();
        $product->name = $request->name;
        $product->cat = $request->category;
        $product->sub = $request->sub_category;
        $product->super = $request->sub_sub_category;
        $product->code = $request->pro_code;
        $product->brand = $request->brand;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->save();


    //Saving Attributes
        foreach($request->sleeve as $sleeve){
            ProductAttribute::create([
                'product_id' => $product->id,
                'attribute_id' => (int)$sleeve
            ]);
        }

        foreach($request->fit as $item){
            ProductAttribute::create([
                'product_id' => $product->id,
                'attribute_id' => (int)$item
            ]);
        }

        foreach($request->leglength as $item){
            ProductAttribute::create([
                'product_id' => $product->id,
                'attribute_id' => (int)$item
            ]);
        }

    // Saving Tags
        $tags = $request->tags;
        $save = ProductTags::saveTags($tags, $product->id);
        if(!$save): 
            return redirect()->back()->with('error','Product tags not saved correctly');
        endif;

    // saving product variant
        $sizes      = $request->size;
        $colors     = $request->color;
        $quantities = $request->quantity;
        $images     = $request->image;
        $quantity   = $request->quantity;

        foreach($quantities as $key => $qty){
            if(
                $qty??null &&
                $sizes[$key]??false &&
                $colors[$key]??false &&
                $images[$key]??false
            ):
                $variant =  new ProductVariant();
                $variant->product_id = $product->id;
                $variant->color_id   = $colors[$key]??0;
                $variant->size_id    = $sizes[$key]??0;
                $variant->qty        = $qty;
                $variant->timestamps = false;
                $variant->save();

            // saving product image for that variant

                //cheacking if image folder is there
                $imagePath = "uploads/product";
                if(!file_exists($imagePath)){
                    mkdir($imagePath,0777,true);
                };

                // Uploading to server
                $imageName = "pimage".time().'-'.uniqid();
                $images[$key]->move($imagePath, $imageName);
       
                // saving to database
                $image = new ProductImages;
                $image->product_id = $product->id;
                $image->variant_id =  $variant->id;
                $image->image = $imageName;
                $image->timestamps = false;
                $image->save();

                // managing product storage
                $storage = new ProductStorage;
                $storage->product_id = $product->id;
                $storage->variant_id = $variant->id;
                $storage->sell       = 0;
                $storage->order      = 0;
                $storage->save();
            else:
                return redirect()->back()->with('error','All variant info were not there');
            endif;
        }

        return redirect()->route('product.index')->with('successMsg','Product Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('category','subcategory','subsubcats')->find($id);
        $categories = Category::all();
        $brand = Brand::all();
        $subcategories = SubCategory::all();
        $subsubcats =  SubSubCategory::all();
        $colors = Color::all();
        $sizes = Size::all();
        $attributes = Attributes::all();
        $productAttributes = ProductAttribute::all();
        $sleeves = $attributes->where('sleeve',1);
        $leglenghts = $attributes->where('leg_length',1);
        $fits = $attributes->where('fit',1);
        $tags = Tags::forProduct();
        $variant  = ProductVariant::where('product_id', $product->id)->get();
        // dd($variant);


        $productTags = ProductTags::where('product_id', $product->id)->get();

        return view('product.edit',compact('product','categories','subcategories','subsubcats','colors','sizes','sleeves','leglenghts','fits', 'tags', 'productTags', 'brand','productAttributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'name'     => 'required',
           'pro_code' => 'required',
           'desc'     => 'required',
           'price'    => 'required',
           'discount' => 'required',
           'details'  => 'required',
          // 'image'    => 'required|mimes:jpeg,jpg,png',
       ]);

        $product = Product::find($id);
        // saving product
        $product->name = $request->name;
        $product->cat = $request->category;
        $product->sub = $request->sub_category;
        $product->super = $request->sub_sub_category;
        $product->code = $request->pro_code;
        $product->brand = $request->brand;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->save();

        // Updating Tags
        $tags = $request->tags;
        $update = ProductTags::updateTags($tags, $product->id);
        if(!$update):   
            redirect()->back()->with('error','Product tags not updated.Old tags may be deleted too');  
        endif;

    // // updating product variant
    //     $sizes      = $request->size;
    //     $colors     = $request->color;
    //     $quantities = $request->quantity;
    //     $images     = $request->image;
    
    // // saving storage,images, variants
    //     foreach($quantities as $key=>$qty):  
    //         // Checking if variant is already there or isn't
    //         $variant = ProductVariant::getVariant(
    //             $product->id,
    //             $sizes[$key],
    //             $colors[$key]
    //         );
    //         if($variant):  
    //             // updating qty to product storage
    //             // updating images
    //         else:
    //             // create variant
    //             // creating qty to product storage
    //             // creating images
    //         endif;
    //     endforeach;

    

  
    return redirect()->back()->with('message','Product Updated');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(file_exists('uploads/product'.$product->image))
        {
              file_delete($product->image);
               //unlink('uploads/product/'.$product->image);
        }
        $product->delete();
        return redirect()->back()->with('successMsg','Product Deleted successfully');
    }
   
   // public function myformAjax($id)
   //  {
   //      $categories = DB::table("category")
   //                  ->where("category_id",$id)
   //                  ->lists("name","id");
   //      return json_encode($categories);
   //  }

   public function addToCart(Request $request)
   {

    // dd(\Session::get('cart'));
    $request->validate([
        'product' => 'required'
    ]);
    
    $cart = \Session::get('cart');
    $newList = $request->product;

    if(!$cart){
        $cart = array();
        array_push($cart, $newList);
        \Session::put('cart', $cart);
    } else {
        array_push($cart, $newList);
        \Session::put('cart', $cart);
    }
    
        header('Content-Type: application/json');
        echo json_encode(['response'=>"200", 'cart' => $cart]);
   }

   public function removeFromCart($param=null)
   {

    header('Content-Type: application/json');
    $cart = \Session::get('cart');
    
    if(empty($cart)){
        //error
        return  json_encode(['response'=>"404", 'msg'=>"no cart data"]);
    }
    $keys = array();
    foreach($cart as $key=>$item){
        if((int)$item['variant_id'] == (int)$param){
            array_push($keys, $key);
        }
    }

    if(empty($keys)){
        //error no data
        return json_encode(['response'=>"404", 'msg'=>"no matching item in cart"]);
    } else {
        foreach($keys as $key){
            unset($cart[$key]);
        }
    }
    \Session::put('cart', $cart);

    return json_encode(['response'=>"200", 'msg'=>"Success"]);

   }


   public function getCart(Request $request)
   {
    $cart = \Session::get('cart');


    $subTotal = 0;
    $shipping = 100;
    header('Content-Type: application/json');

    if($cart){
        foreach($cart as $item){
            $subTotal +=  (int)$item['price'] * (int)$item['qty'];
        }
        echo json_encode(['response'=>"200",'shipping'=>$shipping, 'cart' => $cart, 'sub'=> $subTotal]);
    } else {
        echo json_encode(['response'=>"404", 'cart' => null]);
    }
   }

   public function getProductByTag( Request $request, $tag)
   {
       $tag = (int)$tag;
       $productTags = ProductTags::where('tag_id', $tag)->take(5)->get();
       $products = array();

       foreach($productTags as $tag){
        //    dd($tag->product_id);
           array_push($products, Product::find($tag->product_id));
       }

       
       header('Content-Type: application/json');
       echo json_encode($products);
       
   }

   public function getProductTags()
   {
       $productTags = Tags::where('type', 'product')->get();
       
       header('Content-Type: application/json');
       if($productTags){
            echo json_encode($productTags);
        } else {
            echo json_encode(null);
        }
       

       
   }
    
}
