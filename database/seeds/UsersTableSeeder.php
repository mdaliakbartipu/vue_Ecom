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
        User::create(
        [
            'name' => 'Mr. Saheen',
            'email' => 'ceo@smartsoftware.com.bd',
            'role' => 1,
            'email_verified_at' => today(),
            'password' => bcrypt('1234567'),
        ]);
    }
}
