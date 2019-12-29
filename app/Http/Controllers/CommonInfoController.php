<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommonInfo;


class CommonInfoController extends Controller
{
    public function sizeChart(Request $request)     
    {
        $info = CommonInfo::first();
        if(!$info){
            $info = new CommonInfo;
        }

        $info->size_chart = $request->chart;
        $info->save();
        return redirect('/size/chart');
    }

    public function index(Request $request)
    {
        $info = CommonInfo::first();
        if(!$info){
            $info = new CommonInfo;
        }
        return view('commoninfo.index',compact('info'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'delivery'          => 'required',
            'shippingandreturn' => 'required',
            'specialoffer'      => 'required'
        ]);
            
        $info = CommonInfo::first();
        if(!$info){
            $info = new CommonInfo;
        }


        $info->delivery_time         = (int)$request->delivery??'';
        $info->shipping_and_return   = $request->shippingandreturn??'';
        $info->special_offer         = $request->specialoffer??'';
        $info->save();
        return redirect('commoninfo');
    }

}
