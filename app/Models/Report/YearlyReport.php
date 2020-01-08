<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Model;

class YearlyReport extends Report
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getReport()
    {
        $orders = $this->orderModel->whereYear('created_at', '=', date('Y'))->with('variant')->get();  
        return $orders;
    }
}
