<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $promotions = [
            [   
                'title'     => 'some title',
                'subTitle'  => 'some sub title',
                'slug'      => '#',
                'img'       => 'grid17.jpg'
            ],
            [

                'title'     => 'some title',
                'subTitle'  => 'some sub title',
                'slug'      => '#',
                'img'       => 'grid18.jpg'
            ],
            [
                'title'     => 'some title',
                'subTitle'  => 'some sub title',
                'slug'      => '#',
                'img'       => 'grid19.jpg'
            ],
            [
                'title'     => 'some title',
                'subTitle'  => 'some sub title',
                'slug'      => '#',
                'img'       => 'grid20.jpg'
            ],
            
        ];

        foreach($promotions as $promotion){
            DB::table('promotions')->insert([
                'title' => $promotion['title'],
                'sub_title' => $promotion['subTitle'],
                'image' => $promotion['img'],
                'slug'  => $promotion['slug']
            ]);
        }
    }
}
