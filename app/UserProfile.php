<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profile';
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
