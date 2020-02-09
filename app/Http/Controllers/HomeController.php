<?php

namespace App\Http\Controllers;

use App\Models\NewOrder;
use App\Models\Order;
use App\ProductSale;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    
        $this->middleware(function ($request, $next) {
            if(\Auth::user()->role != 1 ){
                return redirect('/');
            }
            return $next($request);
        });

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $user)
    {
        // get sale data from database
        // all sell count 
        $sales = ProductSale::get();
        $orders = Order::get();

        $saleX = ['jan','fev','mar','april','may','june','july','aug','sept','oct','nov','dec'];
        $saleY = [$orders->sum('total'), 100,0,0,0,0,0,0,0,0,0,0];
        $saleTotal = $orders->sum('total');

        $orderX = ['jan','fev','mar','april','may','june','july','aug','sept','oct','nov','dec'];
        $orderY = [count($orders),0,0,0,0,0,0,0,0,0,0,0];
        $orderCount = count($orders);

        $profitX = ['jan','fev','mar','april','may','june','july','aug','sept','oct','nov','dec'];
        $profitY = [0,0,0,0,0,0,0,0,0,0,0,0];

        $paymentX = ['jan','fev','mar','april','may','june','july','aug','sept','oct','nov','dec'];
        $paymentY = [$orders->where('payment_status','1')->sum('total'),0,0,0,0,0,0,0,0,0,0,0];

        // return $array;
        return view('home.home', [
            'saleX'         =>  json_encode($saleX),
            'saleY'         =>  json_encode($saleY),
            'orderX'        =>  json_encode($orderX),
            'orderY'        =>  json_encode($orderY),
            'profitX'       =>  json_encode($profitX),
            'profitY'       =>  json_encode($profitY),
            'paymentX'      =>  json_encode($paymentX),
            'paymentY'      =>  json_encode($paymentY),
            'orderCount'    =>  $orderCount,
            'saleTotal'     =>  $saleTotal,
        ]
    );
    }
}
