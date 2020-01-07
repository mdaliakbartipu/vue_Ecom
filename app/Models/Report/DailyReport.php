<?php

namespace App\Models\Report;

class DailyReport extends Report
{
    public function __construct()
    {
        parent::__construct();
    }   
    public function getReport()
    {
        $now = date('Y-m-d');
        // dd($now);
        // whereBetween('reservation_from', [$from, $to])->get()
        $orders = $this->orderModel->whereDay('created_at',date('d'))->with('variant')->get();  
        return $orders;
    }
}
