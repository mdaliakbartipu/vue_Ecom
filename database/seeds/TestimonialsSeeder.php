<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonials = [
            [
                'name'      => 'Sumaiya Islam',
                'designation'   => 'Web Designer',
                'message'       => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dignissimos non rerum tempora voluptas. Atque cum eaque modi sed vitae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dignissimos non rerum tempora voluptas.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dignissimos non rerum tempora voluptas.',
                'image'        => 'profile1.jpg',
            ],
            [
                'name'      => 'Shams Pathan',
                'designation'   => 'Web Developer',
                'message'       => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dignissimos non rerum tempora voluptas. Atque cum eaque modi sed vitae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dignissimos non rerum tempora voluptas.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dignissimos non rerum tempora voluptas.',
                'image'        => 'profile2.jpg',
            ],
        ];

        foreach($testimonials as $testimonial){
            DB::table('testimonials')->insert([
                'name' => $testimonial['name'],
                'designation' => $testimonial['designation'],
                'message' => $testimonial['message'],
                'image' => $testimonial['image']
            ]);
        }
    }
}
