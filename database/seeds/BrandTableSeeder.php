<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
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
                'name'      => Str::random(10),
                'image'   => 'brand.png',
                'active'       => true,
            ],
            [
                'name'     => Str::random(10),
                'image'  => 'brand.png',
                'active'      => true,
            ],
            [
                'name'     => Str::random(10),
                'image'  => 'brand.png',
                'active'      => true,
            ]
            
        ];

        foreach($brands as $blog){
            DB::table('brands')->insert([
                'name' => $blog['name'],
                'image' => $blog['image'],
                'active' => $blog['active'],
            ]);
        }
    }
}
