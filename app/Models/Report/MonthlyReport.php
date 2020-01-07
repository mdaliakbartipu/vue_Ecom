<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Model;

class MonthlyReport extends Report
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getReport()
    {
        $orders = $this->orderModel->with('variant')->get();  
        return $orders;
    }
}
