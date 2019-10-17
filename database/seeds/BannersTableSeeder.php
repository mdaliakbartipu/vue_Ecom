<?php

use Illuminate\Database\Seeder;

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
                'img'       => 'banner1.jpg'
            ],
            [
                'title'     => 'Something',
                'subTitle'  => 'Something More',
                'img'       => 'banner2.jpg'
            ],
            [
                'title'     => 'Something',
                'subTitle'  => 'something More',
                'img'       => 'banner3.jpg'
            ]
            
        ];

        foreach($banners as $banner){
            DB::table('banners')->insert([
                'title' => $banner['title'],
                'sub_title' => $banner['subTitle'],
                'image' => $banner['img']
            ]);
        }
    }
}
