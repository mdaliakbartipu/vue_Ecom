<?php

use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            [   
                'slug'      => 'Something More',
                'img'       => 'width_12.jpg'
            ],
            [
                
                'slug'      => 'Something More',
                'img'       => 'width_11.png'
            ],
            [
                
                'slug'      => 'something More',
                'img'       => 'width_26.jpg'
            ],
            [
                
                'slug'      => 'something More',
                'img'       => 'width_27.jpg'
            ],
            [
                
                'slug'      => 'something More',
                'img'       => 'width_27.jpg'
            ]
            
        ];

        foreach($banners as $banner){
            DB::table('promotions')->insert([
                'image' => $banner['img'],
                'slug'  => $banner['slug']
            ]);
        }
    }
}
