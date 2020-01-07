<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function saleSingle()
    {
        return view('report.index-single');
    }
    
    public function saleDaily()
    {
        return view('report.index-daily');
    }

    public function saleMonthly()
    {
        return view('report.index-monthly');
    }

    public function saleYearly()
    {
        return view('report.index-yearly');
    }


}
