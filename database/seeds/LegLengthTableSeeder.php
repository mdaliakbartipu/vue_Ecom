<?php

use Illuminate\Database\Seeder;

class LegLengthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $legLengths = ['one','two','three'];

        foreach($legLengths as $legLength){
            DB::table('leg_lengths')->insert([
                'name' => $legLength
            ]);
        }
    }
}
