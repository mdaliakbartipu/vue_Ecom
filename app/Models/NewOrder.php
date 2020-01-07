<?php

namespace App\Models;

class NewOrder extends Order
{
        // status 0 for new

        public function newQuery($excludeDeleted = true)
        {
            return parent::newQuery($excludeDeleted)
                ->where('status', '=', 0);
        }

}
