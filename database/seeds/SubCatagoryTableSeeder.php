<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCatagoryTableSeeder extends Seeder
{


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
                    'name' => Str::random(5),
                    'slug' => $this->slugify(Str::random(5)),
                ]);
            }

        }
    }
}
