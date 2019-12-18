<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\Color;
use App\Size;
use App\Sleeve;
use App\LegLength;
use App\Fit;
use App\Tags;
use App\ProductTags;
use App\Product;
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
        $sleeves = Sleeve::all();
        $leglenghts = LegLength::all();
        $fits = Fit::all();
        $tags = Tags::forProduct();

        return view('product.create',compact('categories','subcategories','subsubcats','colors','sizes','sleeves','leglenghts','fits', 'tags'));
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
           'discount' => 'required',
           'details'  => 'required',
           'category'  => 'required',
           'sub_category'  => 'required',
           'sub_sub_category'  => 'required'
        ]);
        
    // saving product
        $product = new Product();
        $product->name = $request->name;
        $product->cat = $request->category;
        $product->sub = $request->sub_category;
        $product->super = $request->sub_sub_category;
        $product->code = $request->pro_code;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->details = $request->details;
        $product->sleeve = (int)$request->sleeve;
        $product->leglength = (int)$request->leglength;
        $product->fit = (int)$request->fit;
        $product->save();

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
        $product = Product::with('category','subcategory','subsubcats','sleeves','leglenghts','fits')->find($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $subsubcats =  SubSubCategory::all();
        $colors = Color::all();
        $sizes = Size::all();
        $sleeves = Sleeve::all();
        $leglenghts = LegLength::all();
        $fits = Fit::all();
        $tags = Tags::forProduct();
        $variant  = ProductVariant::where('product_id', $product->id)->get();
        // dd($variant);


        $productTags = ProductTags::where('product_id', $product->id)->get();

        return view('product.edit',compact('product','categories','subcategories','subsubcats','colors','sizes','sleeves','leglenghts','fits', 'tags', 'productTags'));
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
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->details = $request->details;
        $product->sleeve = (int)$request->sleeve;
        $product->leglength = (int)$request->leglength;
        $product->fit = (int)$request->fit;
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
            if(isset($request->variant) && isset($request->qty)){
                
            }
   }

   public function getCart(Request $request)
   {
            if(isset($request->variant) && isset($request->qty)){
                // get product info with thumb
                //make cart like object
                // save to session
                //response text
            }

            
   }
    
}
