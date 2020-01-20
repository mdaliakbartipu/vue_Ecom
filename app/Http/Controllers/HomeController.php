<?php

namespace App\Http\Controllers;

use App\Models\NewOrder;
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

        $sales = ProductSale::get();
        $orders = NewOrder::get();

        $saleX = ['jan','fev','mar','mar','mar','mar','mar','mar','mar','mar'];
        $saleY = [$sales->sum('sell'),0,0,0,0,0,0,0,0,0];

        $orderX = ['jan','fev','mar','mar','mar','mar','mar','mar','mar','mar'];
        $orderY = [$orders->sum('total'),2,3,4,5,6,7,8,9,19];

        $profitX = ['jan','fev','mar','mar','mar','mar','mar','mar','mar','mar'];
        $profitY = [0,2,3,4,5,6,7,8,9,19];

        $paymentX = ['jan','fev','mar','mar','mar','mar','mar','mar','mar','mar'];
        $paymentY = [$orders->where('payment_status','1')->sum('total'),2,3,4,5,6,7,8,9,19];

        // return $array;
        return view('home.home', [
            'saleX'=>json_encode($saleX),
            'saleY'=>json_encode($saleY),
            'orderX'=>json_encode($orderX),
            'orderY'=>json_encode($orderY),
            'profitX'=>json_encode($profitX),
            'profitY'=>json_encode($profitY),
            'paymentX'=>json_encode($paymentX),
            'paymentY'=>json_encode($paymentY),
        ]);
    }
}
