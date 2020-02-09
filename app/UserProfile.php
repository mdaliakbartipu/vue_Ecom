<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'persons';
    
    protected $fillable= [
                'first_name',
                'last_name',
                'country',
                'street',
                'address',
                'city',
                'state',
                'phone',
                'email'
    ];
}
