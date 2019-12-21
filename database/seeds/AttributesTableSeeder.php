<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name'          => Str::random(10),
                'fit'           => true,
                'leg_length'    => false,
                'sleeve'        => false,
            ],
            [
                'name'          => Str::random(10),
                'fit'           => true,
                'leg_length'    => false,
                'sleeve'        => false,
            ],
            [
                'name'          => Str::random(10),
                'fit'           => true,
                'leg_length'    => false,
                'sleeve'        => false,
            ],
            [
                'name'          => Str::random(10),
                'fit'           => false,
                'leg_length'    => true,
                'sleeve'        => false,
            ],
            [
                'name'          => Str::random(10),
                'fit'           => false,
                'leg_length'    => true,
                'sleeve'        => false,
            ],
            [
                'name'          => Str::random(10),
                'fit'           => false,
                'leg_length'    => true,
                'sleeve'        => false,
            ],
            [
                'name'          => Str::random(10),
                'fit'           => false,
                'leg_length'    => false,
                'sleeve'        => true,
            ],
            [
                'name'          => Str::random(10),
                'fit'           => false,
                'leg_length'    => false,
                'sleeve'        => true,
            ],
            [
                'name'          => Str::random(10),
                'fit'           => false,
                'leg_length'    => false,
                'sleeve'        => true,
            ],
            
        ];

        foreach($brands as $blog){
            DB::table('attributes')->insert([
                'name'          => $blog['name'],
                'fit'           => $blog['fit'],
                'leg_length'    => $blog['leg_length'],
                'sleeve'        => $blog['sleeve'],
            ]);
        }
    }
}
