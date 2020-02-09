<?php

namespace App\Models;

class ReturnedOrder extends Order
{
    protected $table = "new_orders";

        // status 4 for returned

        public function newQuery($excludeDeleted = true)
        {
            return parent::newQuery($excludeDeleted)
                ->where('status', '=', 4);
        }
}
