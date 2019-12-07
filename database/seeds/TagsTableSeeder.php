<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name'      => 'New Arrivals',
                'type'        => 'product',
            ],
            [
                'name'      => 'Deals Of The Month',
                'type'        => 'product',
            ],
            [
                'name'      => 'Featured Products',
                'type'        => 'product',
            ],
            [
                'name'      => 'Best Selling Products',
                'type'        => 'product',
            ],
            [
                'name'      => 'INFORMATION',
                'type'        => 'page',
            ],
            [
                'name'      => 'MY ACCOUNT',
                'type'        => 'page',
            ],
            [
                'name'      => 'CUSTOMER SERVICE',
                'type'        => 'page',
            ],
        ];

        foreach($tags as $tag){
            DB::table('tags')->insert([
                'name' => $tag['name'],
                'type' => $tag['type'],            ]);
        }
    }
}
