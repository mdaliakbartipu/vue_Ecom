<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slider extends Model
{
    public static function getALL(){
        return DB::table('sliders')->get();
    }

}
