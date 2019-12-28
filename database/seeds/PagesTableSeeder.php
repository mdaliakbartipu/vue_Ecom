<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'name'      => 'About Us',
                'slug'   => 'about-us',
                'content'       => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, magnam?Lorem ipsum dolor sit amet, consectetur adipisicing',
                'tag'        => '5',

            ],
            [
                'name'     => 'My Account',
                'slug'  => 'my-account',
                'content'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, magnam?Lorem ipsum dolor sit amet, consectetur adipisicing',
                'tag'       => '6',
            ],
            [
                'name'     => 'Sitemap',
                'slug'  => 'sitemap',
                'content'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, magnam?Lorem ipsum dolor sit amet, consectetur adipisicing',
                'tag'       => '7',
            ]
            
        ];

        foreach($pages as $page){
            DB::table('pages')->insert([
                'name' => $page['name'],
                'slug' => $page['slug'],
                'content' => $page['content'],
                'tag' => $page['tag']
            ]);
        }

    }
}
