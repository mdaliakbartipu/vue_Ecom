<?php

use Illuminate\Database\Seeder;

class SleeveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sleeves = ['one','two','three'];

        foreach($sleeves as $sleeve){
            DB::table('sleeves')->insert([
                'name' => $sleeve
            ]);
        }
    }
}
