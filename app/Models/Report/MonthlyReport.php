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
        $orders = $this->orderModel->whereMonth('created_at', date('m'))->with('variant')->get();
        

        $sortedOrder = array();

            $firstDay = new \Carbon\Carbon('last day of last month');
            $lastDay = new \Carbon\Carbon('last day of this month');

            $dayStart = $firstDay;
            $endDay = new \Carbon\Carbon('first day of this month');
        
            while($dayStart < $lastDay){
                $dayStart->add(1,'day');
                $endDay->add(1,'day');
 
                foreach($orders as $order){
                    // echo $dayStart."<br/>";
                    // echo $dayStart."  ".$endDay."<br/>";
                    if(($order->created_at > $dayStart)&&($order->created_at < $endDay)){
                        array_push($sortedOrder, $order);
                    }
                }
            }
            // dd($sortedOrder);

        return $sortedOrder;
    }
}
