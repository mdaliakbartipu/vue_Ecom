<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveredOrder extends Order
{
    protected $table = "new_orders";

    public function newQuery($excludeDeleted = true)
        {
            return parent::newQuery($excludeDeleted)
                ->where('status', '=', 2);
        }
}
