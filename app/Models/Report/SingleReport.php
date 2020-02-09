<?php

namespace App\Models\Report;

class SingleReport extends Report
{

    public $fields = [
        'entryDate'         => null,
        'webID'             => null,
        'description'       => null,
        'totalQty'          => null,
        'saleQty'           => null,
        'availableQty'      => null,
        'buyingPrice'       => null,
        'sellingPrice'      => null,
        'gTotalBuy'         => null,
        'aTotalSale'        => null,
    ];

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
