<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ['xs','sm','m','l','xl'];

        foreach($sizes as $size){
            DB::table('sizes')->insert([
                'name' => $size
            ]);
        }
    }
}
