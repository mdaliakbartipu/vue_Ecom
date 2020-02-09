<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report\Report;

class ReportController extends Controller
{
    public function saleSingle()
    {
        $reports = Report::getSingleReport();
        return view('report.index-single');
    }
    
    public function saleDaily()
    {
        $reports = Report::getDailyReport();
        return view('report.index-daily',compact('reports'));
    }

    public function saleMonthly()
    {
        $reports = Report::getMonthlyReport();
        return view('report.index-monthly',compact('reports'));
    }

    public function saleYearly()
    {
        $reports = Report::getYearlyReport();
        return view('report.index-yearly',compact('reports'));
    }


}
