<?php

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            ['name'=>'Red','code'=>'#FF0000'],
            ['name'=>'Cyan','code'=>'#00FFFF'],
            ['name'=>'Blue','code'=>'#0000FF'],
            ['name'=>'DarkBlue','code'=>'#0000A0'],
            ['name'=>'LightBlue','code'=>'#ADD8E6'],
            ['name'=>'Purple','code'=>'#800080'],
            ['name'=>'Yellow','code'=>'#FFFF00'],
            ['name'=>'Lime','code'=>'#00FF00'],
            ['name'=>'Magenta','code'=>'#FF00FF'],
            ['name'=>'White','code'=>'#FFFFFF'],
            ['name'=>'Silver','code'=>'#C0C0C0'],
            ['name'=>'Gray or Grey','code'=>'#808080'],
            ['name'=>'Black','code'=>'#000000'],
            ['name'=>'Orange','code'=>'#FFA500'],
            ['name'=>'Brown','code'=>'#A52A2A'],
            ['name'=>'Maroon','code'=>'#800000'],
            ['name'=>'Green','code'=>'#008000'],
            ['name'=>'Olive','code'=>'#808000']

        ];
        
        foreach($colors as $color){
            DB::table('colors')->insert([
                'name' => $color['name'],
                'code' => $color['code']
            ]);
        }
}
}
