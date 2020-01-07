<?php

namespace App\Models;

class AcceptedOrder extends Order
{
    // status 1 for accepted

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where('status', '=', 1);
    }
}
