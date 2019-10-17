<?php

use Illuminate\Database\Seeder;

class SubSubCatagoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $subcats = DB::table('sub_categories')->get('id'); 
        foreach($subcats as $subcat){
            for($limit=0; $limit<5; $limit++){
                
                DB::table('sub_sub_categories')->insert([
                    'sub_category_id' => (String)$subcat->id,
                    'name' => Str::random(5)
                ]);
            }

        }
    }
}
