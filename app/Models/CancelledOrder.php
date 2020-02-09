<?php

namespace App\Models;

class CancelledOrder extends Order
{
        // status 3 for cancelled

        public function newQuery($excludeDeleted = true)
        {
            return parent::newQuery($excludeDeleted)
                ->where('status', '=', 3);
        }

}
