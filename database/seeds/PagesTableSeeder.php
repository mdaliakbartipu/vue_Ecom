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
                'content'       => '
                <h1>We are a digital agency focused on delivering content and utility user-experiences.</h1> <p class="text-justify mt-5">
                                    Our brand is inspired by the go-getters, the innovators, the dreamers; and our designs embody this very spirit. We re-imagine timeless aesthetics for a modern era, creating original prints and designing unique pieces that are accessible to all. Our passion is to provide quality apparel to our customers. We’re confident that you’ll love what we will bring to you. We were founded on the belief that style shouldn’t break the bank. Our goal is to change the way you think about fashion by delivering premium designs at radically fair prices.
                </p>
                ',
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
