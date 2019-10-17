<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = [
            [
                'title'     => 'Post with Gallery',
                'authorID'     => 1,
                'desc'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, magnam?Lorem ipsum dolor sit amet, consectetur adipisicing',
                'img'       => 'blog7.jpg'
            ],
            [
                'title'     => 'Post with Gallery',
                'authorID'     => 1,
                'desc'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, magnam?Lorem ipsum dolor sit amet, consectetur adipisicing',
                'img'       => 'blog7.jpg'
            ],
            [
                'title'     => 'Post with Gallery',
                'authorID'     => 1,
                'desc'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, magnam?Lorem ipsum dolor sit amet, consectetur adipisicing',
                'img'       => 'blog7.jpg'
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
