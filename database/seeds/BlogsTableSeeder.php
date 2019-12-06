<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function run()
    {
        $blogs = [
            [
                'title'      => 'Post1 with Gallery',
                'authorID'   => 1,
                'desc'       => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, magnam?Lorem ipsum dolor sit amet, consectetur adipisicing',
                'img'        => 'blog7.jpg',
                'slug'       => $this->slugify("Post1 with Gallery"),
            ],
            [
                'title'     => 'Post2 with Gallery',
                'authorID'  => 1,
                'desc'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, magnam?Lorem ipsum dolor sit amet, consectetur adipisicing',
                'img'       => 'blog7.jpg',
                'slug'      => $this->slugify("Post2 with Gallery"),
            ],
            [
                'title'     => 'Post3 with Gallery',
                'authorID'  => 1,
                'desc'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, magnam?Lorem ipsum dolor sit amet, consectetur adipisicing',
                'img'       => 'blog7.jpg',
                'slug'      => $this->slugify("Post1 with Gallery"),
            ]
            
        ];

        foreach($blogs as $blog){
            DB::table('blogs')->insert([
                'title' => $blog['title'],
                'author_id' => $blog['authorID'],
                'desc' => $blog['desc'],
                'image' => $blog['img']
            ]);
        }
    }
}
