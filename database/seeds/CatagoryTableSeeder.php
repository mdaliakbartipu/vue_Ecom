<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatagoryTableSeeder extends Seeder
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
        $cats = [
        'Men'           =>'person.jpg',
        'Women'         =>'person2.jpg',
        'Kids'          =>'person3.jpg',
        'Home & Living' =>'person4.jpg',
        'Discover'      =>'person5.jpg'
    ];
        foreach($cats as $name=>$image){
            DB::table('categories')->insert([
                'name'      => $name,
                'image'     => $image,
                'slug'      => $this->slugify($name),
                'position' => '1',
                'icon' => 'fa fa-eercast',
            ]);
        }

    }
}
