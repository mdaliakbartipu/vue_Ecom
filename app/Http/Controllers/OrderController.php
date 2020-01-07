<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\NewOrder;
use App\Models\AcceptedOrder;
use App\Models\DeliveredOrder;
use App\Models\CancelledOrder;
use App\Models\ReturnedOrder;

use App\Product;
use App\ProductVariant;
use App\UserProfile;
use App\UserShippingAddress;


// orders type
define("NEW",           0);
define("ACCEPTED",      1);
define("DELIVERED",     2);
define("CANCELLED",     3);
define("RETURNED",      4);

    

class OrderController extends Controller
{

    
    public function gotNewOrder(Request $request)
    {
        // dd($request->all());

        $cart = \Session::get('cart');
        // Variant_id and qty are needed
        // dd($cart);

        $error = false;

        foreach($cart as $item){
            // Creating profile for all except Logged in user
            if(\Auth::user()){
                $userProfile = UserProfile::find(\Auth::user()->id);
                $userProfile->update($request->all());
            } else {
                $userProfile = UserProfile::create($request->all());
            }
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
                $shipping->address    = $request->saddress;
                $shipping->save();
            }

            $user = new \stdClass;            
            $user->id = $userProfile->id;
            $user->shipping = $shipping?$shipping->id:null;
            $user->billing = $userProfile?$userProfile->id:null;
            
            $this->orderNote = $request->order_note??null;
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
            // qty
            // unit price
            $order->unit_price = $product->price;
            $order->qty = $qty;
            // subtotal
            $order->sub_total = $order->unit_price * $order->qty;
            // shipping cost
            $vat    = 0; //5%
            $ship   = 0; //100tk

            $order->shipping_cost = $ship; // must be from database
            // vat
            $order->vat = $vat; // must be from database
            // discount
            $order->discount = $product->discount;
            $order->total = $order->sub_total + ($order->sub_total*$order->vat/100) + $order->shipping_cost - ($order->sub_total*$order->discount/100);
            $order->payment_type = $paymentMethod??'none';
            $order->note = $this->orderNote;
            
            if($order->save())
                return true;
             else 
             return false;

    }

    public function list()
    {
        $orders = NewOrder::with('client')->get();
        // dd($orders);
        return view('order.index', compact('orders'));
    }


    public function newOrderView(NewOrder $order)
    {
        $newOrder = $order;
        return view('order.new-view', compact('newOrder'));
    }

    public function acceptOrder(NewOrder $order)
    {
        if($order){
            $order->status = 1;
            $order->save();
        }
        return view('order.accepted-view', compact('order'));
    }

    public function deliverOrder(AcceptedOrder $order)
    {
        if($order){
            $order->status = 2;
            $order->save();
        }
        return view('order.delivered-view', compact('order'));
    }

    public function deliveredOrder(DeliveredOrder $order)
    {
        return view('order.delivered-view', compact('order'));
    }

    public function cancelledOrder(CancelledOrder $order)
    {
        return view('order.cancelled-view', compact('order'));
    }

    public function deliveredOrderList()
    {
        $orders = DeliveredOrder::with('client')->get();
        return view('order.index-delivered', compact('orders'));
    }

    public function cancelOrder(Order $order)
    {
        if($order){
            $order->status = 3;
            $order->save();
        }
        return view('order.cancelled-view', compact('order'));
    }



    public function returnedOrder(NewOrder $order)
    {
        if($order){
            // 4 is for returned
            $order->status = 4;
            $order->save();
        }
        return view('order.returned-view', compact('order'));
    }

    // List
    public function acceptedOrderList()
    {
        $orders = \App\Models\AcceptedOrder::with('client')->get();

        return view('order.index-accepted', compact('orders'));
    }

    public function CancelledOrderList()
    {
        $orders = \App\Models\CancelledOrder::with('client')->get();

        return view('order.index-cancelled', compact('orders'));
    }

    public function acceptedOrder(AcceptedOrder $order)
    {
        return view('order.accepted-view', compact('order'));
    }
    
}
