<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = DB::table('categories')->get('id');
        $colors = json_decode(json_encode(DB::table('colors')->get('id')), true);
        $sizes = json_decode(json_encode(DB::table('sizes')->get('id')), true);
        $fits = json_decode(json_encode(DB::table('fits')->get('id')), true);
        $sleeves = json_decode(json_encode(DB::table('sleeves')->get('id')), true);
        $leg_lengths = json_decode(json_encode(DB::table('leg_lengths')->get('id')), true);
        

        foreach($cats as $cat){
            
            $subCats = DB::table('sub_categories')->where('category_id', $cat->id)->get('id');
                foreach($subCats as $subcat){
                    $subSubCats = DB::table('sub_sub_categories')->where('sub_category_id', $subcat->id)->get('id');
                    {
                        foreach($subSubCats as $subSubCat){
                            for($start = 0 ; $start<1; $start++){
                                DB::table('products')->insert([
                                    'cat' => (int)$cat->id,
                                    'sub' => (int)$subcat->id,
                                    'super' => (int)$subSubCat->id,
                                    'name' => Str::random(10),
                                    'code' => Str::random(5),
                                    'description' => Str::random(150),
                                    'price' => rand(),
                                    'discount' => rand(),
                                    'details' => Str::random(100),
                                    'sleeve' => $sleeves[array_rand($sleeves)]['id'],
                                    'leglength' => $leg_lengths[array_rand($leg_lengths)]['id'],
                                    'fit' => $fits[array_rand($fits)]['id'],
                                    'thumb'=> 'noimage.jpg'
                                ]);
    
                            }
    
                        }
                    }
                }

        }
    }
}
