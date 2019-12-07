<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatagoryTableSeeder extends Seeder
{
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
                'position' => '1',
            ]);
        }

    }
}
