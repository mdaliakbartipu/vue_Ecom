<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders = [
            [
                'title'       => 'New Arrivals',
                'subTitle'    => 'Summer collection 2019',
                'img-1'       => 'sl1a.jpg',
                'img-2'       => 'sl1b.jpg',
                'discount'    =>  '40',
                'slug'        => '#',
            ],
            [
                'title'       => 'popular products',
                'subTitle'    => 'Winter collection 2019',
                'img-1'       => 'sl3a.jpeg',
                'img-2'       => 'sl3b.jpeg',
                'discount'    =>  '20',
                'slug'        => '#',
            ],
            [
                'title'       => 'New Arrivals',
                'subTitle'    => 'Fall collection 2019',
                'img-1'       => 'sl2a.jpg',
                'img-2'       => 'sl2b.jpg',
                'discount'    =>  '20',
                'slug'        => '#',
            ]
            
        ];

        foreach($sliders as $slider){

            DB::table('sliders')->insert([
                'title' => $slider['title'],
                'sub_title' => $slider['subTitle'],
                'image_1' => $slider['img-1'],
                'image_2' => $slider['img-2'],
                'discount' => $slider['discount'],
                'slug' => $slider['slug']
            ]);
        }
    }
}
