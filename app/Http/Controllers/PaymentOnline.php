<?php

namespace App\Http\Controllers;

use Anouar\Paypalpayment\Facades\PaypalPayment as FacadesPaypalPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Paypalpayment;
use App\Models\PaymentConfig;

class PaymentOnline extends Controller
{

    // private $api = "https://sandbox.sslcommerz.com/gwprocess/v4/api.php";
    // private $storeID = "gheeg5db9272aeb1d0";
    // private $storePassword = "gheeg5db9272aeb1d0@ssl";
    // main api https://securepay.sslcommerz.com/gwprocess/v4/api.php
    // main ID youradamslive
    // main password 5DCCD184B4F1B22379

    private $api = null;
    private $storeID = null;
    private $storePassword = null;

    private $totalAmount = 0;
    private $currency = "BDT";
    protected $shipping;
    private $cart = 'none';



     private function loadSSLCOM()
    {
        $this->api = "https://sandbox.sslcommerz.com/gwprocess/v4/api.php";
        $this->storeID = "gheeg5db9272aeb1d0";
        $this->storePassword = "gheeg5db9272aeb1d0@ssl";
    }

    public function __construct( $request = null, $cart = null){
            $this->shipping = $request;
            $this->cart = $cart;
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payNow($type = null)
    {
        switch($type){
            case 'sslcom':
                $this->loadSSLCOM();
                $this->send($this->setData());
            break;
            case 'paypal':
                $this->loadPaypal();
            break;
            default:
                die("we do not support ".$type);
        }
    }

    public function loadPaypal()
    {
        dd("paypal");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pay()
    {
        $data = $this->setData();
        $this->send($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setData()
    {

        $post_data = array();
        $post_data['store_id'] = 'gheeg5db9272aeb1d0';
        $post_data['store_passwd'] = $this->storePassword;
        $post_data['total_amount'] = $this->totalAmount;
        $post_data['currency'] = $this->currency;
        $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
        $post_data['success_url'] = URL::to('payment/success');
        $post_data['fail_url'] = URL::to('payment/fail');
        $post_data['cancel_url'] = URL::to('payment/cancel');
        # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

        # EMI INFO
        // $post_data['emi_option'] = "1";
        // $post_data['emi_max_inst_option'] = "9";
        // $post_data['emi_selected_inst'] = "9";

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'something';
        $post_data['cus_email'] = 'something';
        $post_data['cus_add1'] = 'something';
        $post_data['cus_city'] = 'something';
        $post_data['cus_state'] = 'something';
        $post_data['cus_postcode'] = "1000(default)";
        $post_data['cus_country'] = 'something';
        $post_data['cus_phone'] = 'something';

                
        # SHIPMENT INFORMATION
        $post_data['ship_name'] = 'something';
        $post_data['ship_add1 '] = 'something';
        $post_data['ship_city'] = 'something';
        $post_data['ship_state'] = 'something';
        $post_data['ship_postcode'] = "1000(default)";
        $post_data['ship_country'] = 'something';

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = 'something';
        $post_data['value_b '] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        # CART PARAMETERS

        $cartArray = array();

        $post_data['cart'] = 'ss';
        $post_data['product_amount'] = 1000;
        

        //should be counted
        $post_data['vat'] = "5";
        $post_data['discount_amount'] = "5";
        $this->totalAmount = $post_data['convenience_fee'] = 60;
        
        $post_data['shipping_method'] = "3";
        $post_data['ship_add1'] = "3";
        $post_data['product_name'] = "product_name";
        $post_data['product_category'] = "product_category";
        $post_data['product_profile'] = "product_category";

        $post_data['total_amount'] = 100;
        
        return $post_data;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentOnlineModel  $paymentOnlineModel
     * @return \Illuminate\Http\Response
     */

    public function send($post_data)
    {
        // dd($post_data);
        $direct_api_url = $this->api;

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle);

        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if ($code == 200 && !(curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzResponse = $content;
        } else {
            curl_close($handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true);
        // dd($sslcz);
        // var_dump($sslcz);

        if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
            echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
            # header("Location: ". $sslcz['GatewayPageURL']);
            exit;
        } else {
            echo "JSON Data parsing error!";
        }
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentOnlineModel  $paymentOnlineModel
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentOnlineModel  $paymentOnlineModel
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentOnlineModel  $paymentOnlineModel
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function success( Request $request )
    {
        
        dd($request);

    }

    public function fail(  Request $request )
    {
        return redirect()->route('cart')->with('Error', 'Your Online Payment Failed!');
    }
    public function cancel( Request $request )
    {
        return redirect()->route('cart')->with('message', 'Your Online Payment Cancelled!\n We accept payment by CASH also ');
    }


    // backend payment config

    public function paymentSetting(Request $request)
    {
        
        // if request is post
        if($request->get('_token')){
            $request->validate([
                'host'              => 'required',
                'store_id'          => 'required',
                'store_password'    => 'required',
                'api_url'           => 'required'
            ]);
    
            $config = PaymentConfig::first();
            if($config){
                $config->update($request->except('_token'));
            } else {
                $config->create($request->except('_token'));
            }
        }

        $config = PaymentConfig::first();

        if(!$config){
            $config = PaymentConfig::create([
                'host'      => 'paypal',
                'api_url'   => 'demo',
                'store_id'  => 'demo',
                'store_password' => 'demo'
            ]);
        }
        return view('payment.config',compact('config'));
    }



}
