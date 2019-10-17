<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Group extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'logo'
    ];

    public static function boot()
    {
        parent::boot();
        if(!App::runningInConsole())
        {
            static::creating(function ($model)
            {
                $model->fill([
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            });
            static::updating(function ($model)
            {
                $model->fill([
                    'updated_at' => Carbon::now(),
                ]);
            });
        }
    }

    public function companies(){
        return $this->hasMany(Company::class);
    }


}
