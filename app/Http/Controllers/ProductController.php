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
           'details'  => 'required'
        ]);
       


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

        //below id line should be deleted after creating image objec
        
       $product->save();

        // Saving Tags
        $tags = $request->tags;

        foreach( $tags as $tag){
            $ptag = new ProductTags;

            $ptag->product_id    = $product->id;
            $ptag->tag_id             = $tag;  
            $ptag->Save();
        }

        //saving images
        
        $images = $request->file('image');
        
        if(!file_exists('uploads/product')){
            mkdir('uploads/product',0777,true);
        }
        
        if(count($request->color)&count($request->size)&count($request->quantity)){
            $count = count($request->color);
            //echo $count;exit;
            for($index =0; $index < $count; $index++ ){
                $imageName = time().'-'.uniqid(). $images[$index]->getClientOriginalName();

                $images[$index]->move('uploads/product', $imageName);
                
                $image = new ProductImages;
                $image->product_id = $product->id;
                $image->image = $imageName;
                $image->timestamps = false;
                echo "########################";
                $image->save();
            }
        }
//        print_r($image);die;
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
           'quantity' => 'required',
          // 'image'    => 'required|mimes:jpeg,jpg,png',
       ]);
         $product = Product::find($id);
        if(Input::hasFile('image'))
    {
        $usersImage = public_path("uploads/product/{$product->image}"); // get previous image from folder
        if (file_exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        $image = Input::file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('uploads/product'), $imageName);
        $product->image = $imageName;
    }

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
        // $product->color = $request->color;
        // $product->size = (int)$request->size;
        // $product->quantity = $request->quantity;
        $product->save();
         return redirect()->route('product.index')->with('successMsg','Product Successfully Updated');
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
              File::delete($product->image);
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

    
}
