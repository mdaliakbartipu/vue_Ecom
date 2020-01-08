<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Color;
use App\Size;
use App\Tags;
use App\Brand;
use App\Product;
use App\Attributes;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\ProductTags;
use App\ProductImages;
use App\ProductAttribute;


use App\ProductStorage;
use App\ProductVariant;

class InventoryController extends Controller
{
    public function purchase()
    {
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('inventory.product-list', compact('products', 'colors', 'sizes'));
    }

    public function purchaseProduct(Product $product)
    {
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

        $images = ProductImages::where('product_id', $product->id)->get()->groupBy('variant_id');

        $variants  = ProductVariant::where('product_id', $product->id)->get()->groupBy('color_id');
        $productTags = ProductTags::where('product_id', $product->id)->get();

        return view('inventory.product-purchase', compact('images', 'variants', 'product', 'categories', 'subcategories', 'subsubcats', 'colors', 'sizes', 'sleeves', 'leglenghts', 'fits', 'tags', 'productTags', 'brand', 'productAttributes'));
    }

    public function addVariant(Request $request)
    {

        $request->validate([
            'product'       => 'required',
            'color'         => 'required',
            'size'          => 'required',
            'qty'           => 'required'
        ]);

        $product = Product::find($request->product)->with('variants')->first();
        $variants = $product->variants;

        $valid = false;
        $var = false;
        //search if a valid pair 
        foreach ($variants as $key=>$variant) {
            $color  = $variant->color_id;
            $size   = $variant->size_id;
            if ($color == $request->color && $size == $request->size) {
                $valid = true;
                $var = $variant;
                break;
            }
        }
        if($valid && $var){
            // increase qty
            $var->qty += $request->qty;
            $var->save()?function(){
                return json_encode(['status' => 200, 'msg' => 'Quantity added successfully']);
            }:function(){
                return json_encode(['status' => 503, 'msg' => 'Quantity NOT added successfully']);
            };

        } else { 
            // if no existing paired found
            $var                = new ProductVariant;
            $var->product_id    = $request->product;
            $var->color_id      = $request->color;
            $var->size_id       = $request->size;
            $var->qty           = $request->qty;
            $var->save()?function(){
                return json_encode(['status' => 200, 'msg' => 'New Quantity added successfully']);
            }
            :function(){return json_encode(['status' => 503, 'msg' => 'Quantity NOT added successfully']);};
        }

    }
}
