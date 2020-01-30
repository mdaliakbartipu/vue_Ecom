<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptag extends Model
{
    protected $table = "tags";
    protected $fillable = ['name','type'];
    public $timestamps = false;

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where('type', '=', 'product');
    }
}
