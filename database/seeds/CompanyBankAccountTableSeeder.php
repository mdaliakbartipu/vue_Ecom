<?php

use App\Models\CompanyBankAccount;
use Illuminate\Database\Seeder;

class CompanyBankAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyBankAccount::create([
                'company_id' => 1,
                'account_name' => "Pacific Design",
                'account_number' => "smsa-0012",
                'bank_name' => "IBBl",
                'branch' => "Dhanmondi-32",
                'swift_code' => "sw-001",
            ]
        );

        CompanyBankAccount::create([
                'company_id' => 1,
                'account_name' => "Pacific Sweeter",
                'account_number' => "smsa-00165",
                'bank_name' => "IBBl",
                'branch' => "Dhanmondi-32",
                'swift_code' => "sw-001",
            ]
        );
    }
}
