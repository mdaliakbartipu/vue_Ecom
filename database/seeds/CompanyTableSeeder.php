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
            'phone1' => '+880 1314474643',
            'phone2' => '+880 1770075589',
            'address' => 'Some address',
            'fax' => '123456789',
            'email' => 'demo@example.com',
            'facebook' => 'https://www.facebook.com/smartsoftbd/',
            'twitter' => 'https://www.facebook.com/smartsoftbd/',
            'linkedin' => 'https://www.linkedin.com/',
            'instagram' => 'https://www.instagram.com/',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14607.55293417929!2d90.3859798!3d23.7513647!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6f0612fa8107b57c!2sSmart%20Software%20Ltd.!5e0!3m2!1sen!2sbd!4v1577095321091!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>'
        ]);
    }
}
