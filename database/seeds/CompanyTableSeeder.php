<?php

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'D7 Brigus',
            'title' => 'Shop Fashion Clothing & Accessories - Official Site - d7brigus.com',
            'logo' => 'logo.png',
            'phone' => '+880 1314474643',
            'fax' => '123456789',
            'email' => 'demo@example.com',
            'facebook' => 'https://www.facebook.com/smartsoftbd/',
            'twitter' => 'https://www.facebook.com/smartsoftbd/',
            'linkedin' => 'https://www.linkedin.com/',
            'instagram' => 'https://www.instagram.com/',
        ]);
    }
}
