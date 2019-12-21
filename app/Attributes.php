<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $fillable =['name','leg_length', 'sleeve', 'fit'];
}
