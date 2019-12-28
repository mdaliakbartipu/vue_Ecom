<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewOrder;
use App\Models\AcceptedOrder;
use App\Models\DeliveredOrder;
use App\Product;
use App\ProductVariant;
use App\UserProfile;
use App\UserShippingAddress;


class OrderController extends Controller
{
    public function gotNewOrder(Request $request)
    {
        // dd($request->all());
        $cart = \Session::get('cart');
        $error = false;

        foreach($cart as $item){
            $userProfile = UserProfile::create($request->all());
            $shipping = null;

            if(isset($request->shipping)){
                $request->validate([
                    'sfirst_name'=>'required',
                    'slast_name'=>'required',
                    'sphone'=>'required',
                    'semail'=>'required',
                    'scountry'=>'required',
                    'sstreet'=>'required',
                    'scity'=>'required',
                    'sstate'=>'required'
                ]);
                $shipping = new UserShippingAddress;
                $shipping->first_name = $request->sfirst_name;
                $shipping->last_name  = $request->slast_name;
                $shipping->phone      = $request->sphone;
                $shipping->email      = $request->semail;
                $shipping->country    = $request->scountry;
                $shipping->street     = $request->sstreet;
                $shipping->city       = $request->scity;
                $shipping->state      = $request->sstate;
                $shipping->address   = $request->saddress;
                $shipping->save();
            }

            $user = new \stdClass;            
            $user->id = $userProfile->id;
            $user->shipping = $shipping?$shipping->id:null;
            $user->billing = $userProfile?$userProfile->id:null;
            $order = $this->saveOrder( 
                            $user ,
                            (int)$item['variant_id'],
                            $item['qty'],
                            $request->payment_method,
                    );  
            if(!$order){
                $error = true;
            }
        }
        if(!$error){
            session(['cart' => null]);
            return \redirect('/')->with('success','Your order is placed. Thanks you!');
        } else {
            return \redirect('/')->with('error','Something went wrong! Please Contact us');
        }
    }

    /**
     * 
     * get 
     *     User object{
     *          id  //user id 
     *          shipping //shipping id
     *          billing     //billing id
     *      }
     * 
     *     int variant id
     *     int qty
     *     string payment method 
     *             1=cash 2=online
     *     int orderStatus 
     *             1 = new order 
     *             2 = accepted order 
     *             3 = Delivered order
     * 
     * saves to order tables specified by order status
     */
    
    private function saveOrder( object $user,
                                int $variantID,
                                int $qty,
                                string $paymentMethod){

            $info = ProductVariant::find($variantID);
            $product = Product::find($info['product_id']);
            
            $order = new NewOrder;
            $order->user_id = $user->id;
            $order->shipping_id = $user->shipping??null;
            $order->billing_id = $user->billing;
            $order->variant_id = $variantID;
            $order->qty = $qty;
            // qty
            // unit price
            $order->unit_price = $product->price;
            // shipping cost
            $order->shipping_cost = 100; // must be from database
            // vat
            $order->vat = 100; // must be from database
            // discount
            $order->discount = $product->discount;
            $order->payment_type = $paymentMethod??'none';
            
            if($order->save())
                return true;
             else 
             return false;

    }
}
