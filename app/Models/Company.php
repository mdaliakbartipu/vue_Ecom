<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = [
        'name',
        'title',
        'logo',
        'phone', 
        'fax',
        'email',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
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
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function company_details(){
        return $this->hasOne(CompanyDetails::class);
    }
    public function company_bank_account(){
        return $this->hasMany(CompanyBankAccount::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }

}
