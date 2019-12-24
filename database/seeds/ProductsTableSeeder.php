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
        $tags = json_decode(json_encode(DB::table('tags')->where('type','product')->get('id')), true);
        $brands = json_decode(json_encode(DB::table('brands')->get('id')), true);
        $attributes = json_decode(json_encode(DB::table('attributes')->get('id')), true);
        

        foreach($cats as $cat){
            
            $subCats = DB::table('sub_categories')->where('category_id', $cat->id)->get('id');
                foreach($subCats as $subcat){
                    $subSubCats = DB::table('sub_sub_categories')->where('sub_category_id', $subcat->id)->get('id');
                    {
                        foreach($subSubCats as $subSubCat){
                            for($start = 0 ; $start<1; $start++){
                                $id = DB::table('products')->insertGetId([
                                    'cat' => (int)$cat->id,
                                    'sub' => (int)$subcat->id,
                                    'super' => (int)$subSubCat->id,
                                    'name' => Str::random(10),
                                    'slug' => Str::random(10),
                                    'code' => Str::random(10),
                                    'description' => Str::random(150),
                                    'buy_price' => rand(100,500),
                                    'price' => rand(501,3000),
                                    'brand' => $brands[array_rand($brands)]['id'],
                                    'discount' => rand(1,99),
                                    'views' => rand(1,1000),
                                    'discount_till' => date('Y-m-d', strtotime( '+'.mt_rand(0,30).' days')),
                                    'free_shipping' => rand(10,30),
                                    'active' => true,
                                    'details' => Str::random(100),
                                    'thumb1'=> 'thumb1.jpg',
                                    'thumb2'=> 'thumb2.jpg',
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s')
                                ]);

                                DB::table('product_tags')->insert([
                                    'product_id'=>$id,
                                     'tag_id' => $tags[array_rand($tags)]['id'],
                                 ]);
                                 DB::table('product_attributes')->insert([
                                    'product_id'=>$id,
                                     'attribute_id' => $attributes[array_rand($attributes)]['id'],
                                 ]);
                                 for($i=0; $i < 1; $i++):
                                 DB::table('product_variant')->insert([
                                    'product_id'=>$id,
                                     'color_id' => $colors[array_rand($colors)]['id'],
                                     'size_id' => $sizes[array_rand($sizes)]['id'],
                                     'qty' => rand(0,10),
                                 ]);
                                 endfor;    
                            }
    
                        }
                    }
                }

        }
    }
}
