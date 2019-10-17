<?php

use App\Models\CompanyDetails;
use Illuminate\Database\Seeder;

class CompanyDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyDetails::create([
            'company_id' => 1,
            'vat_no' => 1001,
            'facsimile_number' => 54641,
            'bonded_license' => 796454,
            'membership_number' => 4545,
            'bkmea_reg_no' => 78456,
            'import_reg_certi' => 4566,
            'export_reg_certi' => 5454,
            'epb_reg_no' => 1212,
        ]);
    }
}
