<?php


namespace App\Http\Controllers;


use App\Help\Imagelib\ImageResizeException;
use App\Help\Imagelib\ImageResize;

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
use App\Models\ProductStorage;
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
        $products = Product::with('brandInfo','category')->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ajaxGetSub(Request $request)
    {
        $id = (int) $request['id'];
        $subcategories = SubCategory::where('category_id', '=', $id)->get();
        return json_encode($subcategories);
    }

    public function ajaxGetSubsub(Request $request)
    {
        $id = (int) $request['id'];
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

        return view('product.create', compact('categories', 'subcategories', 'subsubcats', 'colors', 'sizes', 'attributes', 'tags', 'brand'));
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

        // dd($request->all());
        $this->validate($request, [
            'name'              => 'required|max:190',
            'hover_name'        => 'required|max:190',
            'code'              => 'required|unique:products|max:190',
            'price'             => 'required|numeric|min:2',
            'brand'             => 'required',
            'discount'          => 'required|numeric',
            'vat'               => 'required|numeric',
            'discount_days'     => 'required|numeric',
            'details'           => 'required',
            'new'               => 'required',
            'category'          => 'required',
            'sub_category'      => 'required',
            'sub_sub_category'  => 'required',
        ]);

        // saving product
        $product                = new Product();
        $product->name          = $request->name;
        $product->hover_name    = $request->hover_name;
        $product->slug          = str_slug($product->name);
        $product->cat           = $request->category;
        $product->new           = $request->new;
        $product->sub           = $request->sub_category;
        $product->super         = $request->sub_sub_category;
        $product->code          = $request->code;
        $product->brand_id         = $request->brand;
        $product->price         = $request->price;
        $product->details       = $request->details;
        $product->discount      = $request->discount ?? 0;
        $product->vat           = $request->vat ?? 0;

        // Embroiddery PDF 
        if($request->embroidery):
            $pdf = $request->embroidery;
            $pdfPath = 'front/assets/.uploads/products/pdf';
            // creating folder if not available
            if (!file_exists($pdfPath)) {
                mkdir($pdfPath, 0777, true);
            };
            // saving pdf
            $pdfName = "ppdf" . '-' . time() * rand(10000, 99999) . '-' . uniqid() . '.' . $pdf->getClientOriginalExtension();
                    // continue;
                    try {
                        if (!$pdf->move(public_path($pdfPath), $pdfName))
                            throw new \Exception('Not saved');
                    } catch (\Exception $e) {
                        echo 'Not saved image' . var_dump($pdf);
                    }
            $product->embroidery = $pdfName;
                else:
                    $product->embroidery = '$pdfName';
        endif;

        $product->video_link = $request->video ?? '';
        
        // calculating discount days with date
        $days = (int)$request->discount_days??0;
        $date = new \DateTime(now());
        // adding days
        $newDate = $date->add(new \DateInterval('P'.$days.'D'));

        $product->discount_till = $newDate;

        $product->rating_default = $request->rating_default??0;
        $product->rating = 0;
        $product->save();


        //Saving Attributes
        if ($request->sleeve) :
            foreach ($request->sleeve as $sleeve) {
                ProductAttribute::create([
                    'product_id' => $product->id,
                    'attribute_id' => (int) $sleeve
                ]);
            }
        endif;
        if ($request->fit) :
            foreach ($request->fit as $item) {
                ProductAttribute::create([
                    'product_id' => $product->id,
                    'attribute_id' => (int) $item
                ]);
            }
        endif;
        if ($request->leglength) :
            foreach ($request->leglength as $item) {
                ProductAttribute::create([
                    'product_id' => $product->id,
                    'attribute_id' => (int) $item
                ]);
            }
        endif;
        if ($request->tags) :
            // Saving Tags
            $tags = $request->tags;
            $save = ProductTags::saveTags($tags, $product->id);
            if (!$save) :
                return redirect()->back()->with('error', 'Product tags not saved correctly');
            endif;
        endif;
        // saving product variant
        $sizes      = $request->size;
        $colors     = $request->color;
        $quantities = $request->quantity;
        $images     = $request->image;
        // dd($request->all());
        // Useses for locate first two thumbs
        $thumbs = array();
        foreach ($quantities as $key => $qty) {
            if (
                $qty ?? null &&
                $sizes[$key] ?? false &&
                $colors[$key] ?? false &&
                $images[$key] ?? false
            ) :
                $variant =  new ProductVariant();
                $variant->product_id = $product->id;
                $variant->color_id   = $colors[$key] ?? 0;
                $variant->size_id    = $sizes[$key] ?? 0;
                $variant->qty        = $qty;
                $variant->timestamps = false;
                $variant->save();
                // dd($variant);
                // saving product image for that variant
                //cheacking if image folder is there
                $imagePath = "front/assets/.uploads/products";
                $thumbPath = "front/assets/.uploads/products/thumbs";

                if (!file_exists($imagePath)) {
                    mkdir($imagePath, 0777, true);
                };
                if (!file_exists($thumbPath)) {
                    mkdir($thumbPath, 0777, true);
                };
                // first level array size will be the same as COLORS
                // and first level keys will be same as COLORS,Size and Quantities
                // So foreach COLORS we get $image(s) 
                // / each color got these images
                if(isset($images[$key])):
                foreach ($images[$key] as $img) :
                    // Uploading to server
                    $imageName = "pimg" . '-' . time() * rand(10000, 99999) . '-' . uniqid() . '.' . $img->getClientOriginalExtension();
                    // continue;
                    try {
                        if (!$img->move(public_path($imagePath), $imageName))
                            throw new \Exception('Not saved');
                    } catch (\Exception $e) {
                        echo 'Not saved image' . var_dump($img);
                    }
                    $image  = public_path($imagePath) . '/' . $imageName;
                    $thumbImage = public_path($thumbPath) . '/' . $imageName;
                    // converting small images
                    $thumb = new ImageResize($image);
                    $thumb->resize(213, 260);
                    $thumb->save($thumbImage);
                    // pushing first two thumbs to thumbs array
                    if (count($thumbs) < 2) {
                        array_push($thumbs, $imageName);
                    }
                    // saving to database
                    $im = new ProductImages;
                    $im->product_id = $product->id;
                    // it will be the color id 
                    $im->variant_id =  $colors[$key];
                    $im->image = $imageName;
                    $im->timestamps = false;
                    $im->save();
                endforeach;
                // saving first two thumbs to product table

                $product->thumb1 = $thumbs[0];
                $product->thumb2 = $thumbs[1];
                $product->save();
            endif;
                // managing product storage
                $storage = new ProductStorage;
                $storage->product_id = $product->id;
                $storage->variant_id = $colors[$key];
                $storage->sell       = 0;
                $storage->order      = 0;
                $storage->save();
            else :
                return redirect()->back()->with('error', 'All variant info were not there');
            endif;
        }

        return redirect()->route('product.index')->with('successMsg', 'Product Successfully Added');
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
        $product = Product::with('category', 'subcategory', 'subsubcats')->find($id);
        $categories = Category::all();
        $brand = Brand::all();
        $subcategories = SubCategory::all();
        $subsubcats =  SubSubCategory::all();
        $colors = Color::all();
        $sizes = Size::all();
        $attributes = Attributes::all();
        $productAttributes = ProductAttribute::where('product_id', $product->id)->get();
        // dd($productAttributes);
        $sleeves = $attributes->where('sleeve', 1);

        $leglenghts = $attributes->where('leg_length', 1);
        $fits = $attributes->where('fit', 1);
        $tags = Tags::forProduct();
        // phpinfo();
        $images = ProductImages::where('product_id', $product->id)->get()->groupBy('variant_id');
        // dd($images);
        $variants  = ProductVariant::where('product_id', $product->id)->get()->groupBy('color_id');
        $productTags = ProductTags::where('product_id', $product->id)->get();
        // dd("ssd");

        return view('product.edit', compact('images', 'variants', 'product', 'categories', 'subcategories', 'subsubcats', 'colors', 'sizes', 'sleeves', 'leglenghts', 'fits', 'tags', 'productTags', 'brand', 'productAttributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {

        $this->validate($request, [
            'name'              => 'required|max:190',
            'hover_name'        => 'required|max:190',
            'code'              => 'required|max:190',
            'price'             => 'required',
            'brand'             => 'required',
            'discount'          => 'required',
            'discount_days'     => 'required',
            'details'           => 'required',
            'new'               => 'required',
            'category'          => 'required',
            'sub_category'      => 'required',
            'sub_sub_category'  => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->hover_name = $request->hover_name;
        $product->slug = str_slug($product->name);
        $product->cat = $request->category;
        $product->new = $request->new;
        $product->sub = $request->sub_category;
        $product->super = $request->sub_sub_category;
        $product->code = $request->code;
        $product->brand_id = $request->brand;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->discount = $request->discount ?? 0;
        $product->vat = $request->vat ?? 0;
        // Embroiddery PDF 
        if($request->embroidery):
            $pdf = $request->embroidery;
            $pdfPath = 'front/assets/.uploads/products/pdf';
            // creating folder if not available
            if (!file_exists($pdfPath)) {
                mkdir($pdfPath, 0777, true);
            };
            // saving pdf
            $pdfName = "ppdf" . '-' . time() * rand(10000, 99999) . '-' . uniqid() . '.' . $pdf->getClientOriginalExtension();
                    // continue;
                    try {
                        if (!$pdf->move(public_path($pdfPath), $pdfName))
                            throw new \Exception('Not saved');
                    } catch (\Exception $e) {
                        echo 'Not saved image' . var_dump($pdf);
                    }
            $product->embroidery = $pdfName;
        endif;



        $product->video_link = $request->video ?? '';
        
        // calculating discount days with date
        $days = (int)$request->discount_days??0;
        $date = new \DateTime(now());
        // adding days
        $newDate = $date->add(new \DateInterval('P'.$days.'D'));

        $product->discount_till = $newDate;
        $product->rating_default = $request->rating?$request->rating_default:0;
        $product->save();

        // dd($product->id);

        // Updating Tags
        $tags = $request->tags;
        $update = ProductTags::updateTags($tags, $product->id);
        if (!$update) :
            redirect()->back()->with('error', 'Product tags not updated.Old tags may be deleted too');
        endif;

        // saving new attributes    

        // legs
        // getting previous attributes saving ids
        $oldAttributes = ProductAttribute::where('product_id', $id)->get();
        $attributesError = false;
        // saving legs
        if (!empty($request->leglength)) :
            // saving new leg lenghths
            foreach ($request->leglength as $leg) :
                $newAttribute = new ProductAttribute;
                $newAttribute->product_id = $id;
                $newAttribute->attribute_id = (int) $leg;
                if (!$newAttribute->save()) :
                    $attributesError = true;
                endif;
            endforeach;
        endif;

        // saving fit
        if (!empty($request->fit)) :
            // saving new leg lenghths
            foreach ($request->fit as $fit) :
                $newAttribute = new ProductAttribute;
                $newAttribute->product_id = $id;
                $newAttribute->attribute_id = (int) $fit;
                if (!$newAttribute->save()) :
                    $attributesError = true;
                endif;
            endforeach;
        endif;

        // saving sleeve
        if (!empty($request->sleeve)) :
            // saving new leg lenghths
            foreach ($request->sleeve as $sleeve) :
                $newAttribute = new ProductAttribute;
                $newAttribute->product_id = $id;
                $newAttribute->attribute_id = (int) $sleeve;
                if (!$newAttribute->save()) :
                    $attributesError = true;
                endif;
            endforeach;
        endif;

        if (!$attributesError) :
            // delete all olds!
            foreach ($oldAttributes as $old) :
                $old->delete();
            endforeach;
        endif;



        if(empty($request->image)) return redirect()->back()->with('message', 'Product Updated.but not images...');


        // Images related things
        $imagePath = "front/assets/.uploads/products";
        $thumbPath = "front/assets/.uploads/products/thumbs";

        if (!file_exists($imagePath)) {
            mkdir($imagePath, 0777, true);
        };
        if (!file_exists($thumbPath)) {
            mkdir($thumbPath, 0777, true);
        };

        $thumbs = array();

        foreach ($request->image as $key => $image) {
            $color_id = $key;
            // Each color id can has many images, so
            foreach ($image as $img) {
                // dd($img);
                // Uploading to server
                $imageName = "pimg" . '-' . time() * rand(10000, 99999) . '-' . uniqid() . '.' . $img->getClientOriginalExtension();

                // continue;
                try {
                    if (!$img->move(public_path($imagePath), $imageName))
                        throw new \Exception('Not saved');
                } catch (\Exception $e) {
                    echo 'Not saved image' . var_dump($img);
                }
                $image  = public_path($imagePath) . '/' . $imageName;
                $thumbImage = public_path($thumbPath) . '/' . $imageName;

                // converting small images
                $thumb = new ImageResize($image);
                $thumb->resize(213, 260);
                $thumb->save($thumbImage);
                
                if (count($thumbs) < 2) {
                    array_push($thumbs, $imageName);
                }

                // saving to database
                $im = new ProductImages;
                $im->product_id = $id;
                // it will be the color id 
                $im->variant_id =  $color_id;
                $im->image = $imageName;
                $im->timestamps = false;
                $im->save();
            }
        }

        // saving new thumbs
        if(count($thumbs)==2){
            $product->thumb1 = $thumbs[0];
            $product->thumb2 = $thumbs[1];
            $product->save();    
        }
 
        return redirect()->back()->with('message', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->with('images')->first();

        // deleting thumbs
        $thumbPath = 'front/assets/.uploads/products/thumbs/';
        $imagePath = 'front/assets/.uploads/products/';
        if (file_exists($thumbPath.$product->thumb1)) {
            unlink($thumbPath.$product->thumb1);
        }
        if (file_exists($thumbPath.$product->thumb2)) {
            unlink($thumbPath.$product->thumb2);
        }

        // deleting all images
        foreach($product->images as $img){
            if(file_exists($imagePath.$img->image))
            unlink($imagePath.$img->image);
        }
        // deleting product images entry
        ProductImages::where('product_id', $product->id)->delete();
        // deleting product attributes
        
         $product->delete();
        return redirect()->back()->with('successMsg', 'Product Deleted successfully');
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

        // echo json_encode(['response' => "200", 'cart' => $request->product['variant_id']]);die('');
        // dd(\Session::get('cart'));
        $request->validate([
            'product' => 'required'
        ]);

        // \Session::put('req', $request);
            // dd(\Session::get('req'));
        $cart = \Session::get('cart');
        // dd($cart);
        $newList = $request->product;

        if (!$cart) {
            $cart = array();
            array_push($cart, $newList);
            \Session::put('cart', $cart);
        } else {
            $updated = 0;
            foreach($cart as &$item){
                // echo json_encode(['response' => "200", 'cart' => $item['variant_id']]);die('');
                if($item['variant_id'] == $newList['variant_id']){
                    $item['qty'] += $newList['qty'];
                    $updated++;
                }
            }
            if(!$updated){
                array_push($cart, $newList);
            }
            
            \Session::put('cart', $cart);
        }

        header('Content-Type: application/json');
        echo json_encode(['response' => "200", 'cart' => $cart]);
    }

    public function removeFromCart($param = null)
    {

        header('Content-Type: application/json');
        $cart = \Session::get('cart');

        if (empty($cart)) {
            //error
            return  json_encode(['response' => "404", 'msg' => "no cart data"]);
        }
        $keys = array();
        foreach ($cart as $key => $item) {
            if ((int) $item['variant_id'] == (int) $param) {
                array_push($keys, $key);
            }
        }

        if (empty($keys)) {
            //error no data
            return json_encode(['response' => "404", 'msg' => "no matching item in cart"]);
        } else {
            foreach ($keys as $key) {
                unset($cart[$key]);
            }
        }
        \Session::put('cart', $cart);

        return json_encode(['response' => "200", 'msg' => "Success"]);
    }


    public function getCart(Request $request)
    {
        $cart = \Session::get('cart');


        $subTotal = 0;
        $shipping = 0;

        header('Content-Type: application/json');

        if ($cart) {
            foreach ($cart as $item) {
                $subTotal +=  (int) $item['price'] * (int) $item['qty'];
            }
            echo json_encode(['response' => "200", 'shipping' => $shipping, 'cart' => $cart, 'sub' => $subTotal]);
        } else {
            echo json_encode(['response' => "404", 'cart' => null]);
        }
    }

    public function getProductByTag(Request $request, $tag)
    {
        $tag = (int) $tag;
        $productTags = ProductTags::where('tag_id', $tag)->orderBy('id', 'desc')->take(5)->get();
        $products = array();

        foreach ($productTags as $tag) {
            //    dd($tag->product_id);
            $pro = Product::where('id', $tag->product_id)->first();
            if ($pro->brandName()) {
                $pro->brand = $pro->brandName()->name;
            } else {
                $pro->brand = 'Classified';
            }
            array_push($products, $pro);
        }


        header('Content-Type: application/json');
        echo json_encode($products);
    }

    public function getImagesByColor(Request $request)
    {
        //    $request->validate([
        //        'product' => 'require',
        //        'color'   => 'required'
        //    ]);

        $images = ProductImages::where('product_id', $request->product)
            ->where('variant_id', $request->color)->get();
        if (!empty($images)) :
            return json_encode(['status' => 200, 'images' => $images]);
        else :
            return json_encode(['status' => 404, 'msg' => 'No images found']);
        endif;
    }
    public function getProductTags()
    {
        $productTags = Tags::where('type', 'product')->get();

        header('Content-Type: application/json');
        if ($productTags) {
            echo json_encode($productTags);
        } else {
            echo json_encode(null);
        }
    }

    public function apiCatProducts($slug)
    {
        $products = Category::where('slug', (string)$slug)->with('products')->first();
        if($products){
            return json_encode(['status'=>200, 'cat' => $products]);
        } else {
            return json_encode(['status'=>404, 'msg'=>'No products']);
        }
    }

    public function apiGetColors()
    {
        $colors = Color::all();
        if($colors){
            return json_encode(['status'=>200, 'colors'=>$colors]);
        } else {
            return json_encode(['status'=>200, 'msg'=>'No color found']);
        } 
    }

    public function apiGetSizes()
    {
        $sizes = Size::all();
        if($sizes){
            return json_encode(['status'=>200, 'sizes'=>$sizes]);
        } else {
            return json_encode(['status'=>200, 'msg'=>'No color found']);
        } 
    }
    public function apiGetBrands()
    {
        $brands = Brand::all();
        if($brands){
            return json_encode(['status'=>200, 'brands'=>$brands]);
        } else {
            return json_encode(['status'=>200, 'msg'=>'No color found']);
        } 
    }


    public function apiCheckIfSize(Request $request)
    {
        // dd($request->all());
        $pro = $request->product?(int)$request->product:null;
        $size = $request->size?(int)$request->size:null;

        if($pro && $size){
            $found = ProductVariant::where('product_id',$pro)->where('size_id', $size)->first();
            if($found){
                return json_encode(['status'=>200, 'size'=> true]);
            } else {
                return json_encode(['status'=>200, 'size'=>false]);
            }
        } else {
            return json_encode(['status'=>404, 'msg'=>'wrong parameters']);
        }
    }
    public function apiCheckIfColor(Request $request)
    {
        // dd($request->all());
        $pro = $request->product?(int)$request->product:null;
        $color = $request->color?(int)$request->color:null;

        if($pro && $color){
            $found = ProductVariant::where('product_id',$pro)->where('color_id', $color)->first();
            if($found){
                return json_encode(['status'=>200, 'color'=> true]);
            } else {
                return json_encode(['status'=>200, 'color'=>false]);
            }
        } else {
            return json_encode(['status'=>404, 'msg'=>'wrong parameters']);
        }
    }
    public function apiCheckIfBrand(Request $request)
    {
        // dd($request->all());
        $pro = $request->product?(int)$request->product:null;
        $size = $request->size?(int)$request->size:null;

        if($pro && $size){
            $found = ProductVariant::where('product_id',$pro)->where('size_id', $size)->first();
            if($found){
                return json_encode(['status'=>200, 'size'=> true]);
            } else {
                return json_encode(['status'=>200, 'size'=>false]);
            }
        } else {
            return json_encode(['status'=>404, 'msg'=>'wrong parameters']);
        }
    }

    public function order(Request $request)
    {
        dd($request->all());
    }

}
