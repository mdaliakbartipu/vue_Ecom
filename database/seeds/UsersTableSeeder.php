<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'company_id' => 1,
            'name' => 'Mr. Admin',
            'email' => 'admin@demo.com',
            'email_verified_at' => today(),
            'password' => bcrypt('admin'),
        ]);
    }
}
