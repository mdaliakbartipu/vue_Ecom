<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'group_id' => 1,
            'name' => 'Company Pacific',
            'head_office' => 'Here is Head office Information',
            'factory' => 'Here is Factory office Information',
            'contact_name' => 'Mr. Contact Name',
            'position' => 'CEO',
            'phone_number' => '01777777777',
            'fax' => '01777777777',
            'email' => 'pacific_company@gmail.com',
            'country' => 'Bangladesh',
            'top_text' => 'From the given facts we know Wen had facsimiled a letter to Jo revoking his offer before Jo received the letter and replied to it.',
            'logo' => 'default.png',
        ]);
    }
}
