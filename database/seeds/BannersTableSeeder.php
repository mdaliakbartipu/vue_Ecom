<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BannersTableSeeder extends Seeder
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
                'title'     => 'Something',
                'subTitle'  => 'Something More',
                'img'       => 'adone.png',
                'slug'      => '#',
            ],
            [
                'title'     => 'Something',
                'subTitle'  => 'Something More',
                'img'       => 'adtwo.png',
                'slug'      => '#',
            ],
            [
                'title'     => 'Something',
                'subTitle'  => 'something More',
                'img'       => 'adthree.png',
                'slug'      => '#',
            ]
            
        ];

        foreach($banners as $banner){
            DB::table('banners')->insert([
                'title'     => $banner['title'],
                'sub_title' => $banner['subTitle'],
                'image'     => $banner['img'],
                'slug'      => $banner['slug'],
            ]);
        }
    }
}
