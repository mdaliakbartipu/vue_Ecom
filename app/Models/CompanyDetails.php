<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class CompanyDetails extends Model
{
    protected $fillable = [
      'company_id', 'vat_no', 'facsimile_number', 'bonded_license', 'membership_number', 'bkmea_reg_no', 'import_reg_certi', 'export_reg_certi', 'epb_reg_no'
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
