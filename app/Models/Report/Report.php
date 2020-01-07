<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function __construct()
    {
        $this->orderModel           = new \App\Models\Order;
        $this->productModel         = new \App\Product;
        $this->productSaleModel     = new \App\ProductSale;
        $this->productVariantModel  = new \App\ProductVariant;
    }

    public static function getSingleReport()
    {
        return (new SingleReport())->getReport();
    }

    public static function getDailyReport()
    {
        return (new DailyReport())->getReport();
    }
    public static function getMonthlyReport()
    {
        return (new MonthlyReport())->getReport();
    }
    public static function getYearlyReport()
    {
        return (new YearlyReport())->getReport();
    }
}
