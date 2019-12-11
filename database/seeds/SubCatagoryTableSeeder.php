<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCatagoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $cats = DB::table('categories')->get('id'); 
        foreach($cats as $cat){
            for($limit=0; $limit<2; $limit++){
                
                DB::table('sub_categories')->insert([
                    'category_id' => (String)$cat->id,
                    'name' => Str::random(5)
                ]);
            }

        }
    }
}
