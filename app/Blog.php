<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    public static function getAuthorName(int $id){
        return DB::table('users')->where('id', $id)->pluck('name')->first();
    }
}
