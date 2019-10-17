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
        'Men'           =>'-2019-10-16-5da6ef583d090.jpg',
        'Women'         =>'-2019-10-16-5da6ec079c671.jpg',
        'Kids'          =>'-2019-10-16-5da6ec5d826a3.jpg',
        'Home & Living' =>'-2019-10-16-5da6ecd219fcd.jpg',
        'Discover'      =>'-2019-10-16-5da6efc909896.jpg'
    ];
        foreach($cats as $name=>$image){
            DB::table('categories')->insert([
                'name' => $name,
                'image'=> $image
            ]);
        }

    }
}
