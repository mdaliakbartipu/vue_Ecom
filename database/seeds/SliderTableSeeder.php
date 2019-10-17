<?php

use Illuminate\Database\Seeder;

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
                'title'     => 'popular products',
                'subTitle'  => 'Summer<br>collection 2019',
                'img'       => 'slider1.jpg'
            ],
            [
                'title'     => 'big sale products',
                'subTitle'  => 'wooden minimalist<br>chair 2019',
                'img'       => 'slider2.jpg'
            ],
            [
                'title'     => 'new arrivals',
                'subTitle'  => 'business<br> off mobile apps',
                'img'       => 'slider3.jpg'
            ],
            [
                'title'     => 'new arrivals',
                'subTitle'  => 'cellphone <br>  new model 2019',
                'img'       => 'slider4.jpg'
            ]
            
        ];

        foreach($sliders as $slider){
            DB::table('sliders')->insert([
                'title' => $slider['title'],
                'sub_title' => $slider['subTitle'],
                'image' => $slider['img']
            ]);
        }
    }
}
