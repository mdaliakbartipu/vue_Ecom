<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CompanyBankAccount extends Model
{
    protected $fillable = [
      'company_id', 'account_name', 'account_number', 'bank_name', 'branch', 'swift_code'
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

    public function company(){
        return $this->belongsTo(Company::class);
    }

}
