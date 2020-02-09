<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveredOrder extends Order
{
    public function newQuery($excludeDeleted = true)
        {
            return parent::newQuery($excludeDeleted)
                ->where('status', '=', 2);
        }
}
