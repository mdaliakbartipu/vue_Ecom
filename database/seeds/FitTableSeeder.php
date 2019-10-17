<?php

use Illuminate\Database\Seeder;

class FitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fits = ['one','two','three'];

        foreach($fits as $fit){
            DB::table('fits')->insert([
                'name' => $fit
            ]);
        }
    }
}
