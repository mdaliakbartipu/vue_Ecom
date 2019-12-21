<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CompanyTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(CatagoryTableSeeder::class);
         $this->call(SubCatagoryTableSeeder::class);
         $this->call(SubSubCatagoryTableSeeder::class);
         $this->call(ColorTableSeeder::class);
         $this->call(SizeTableSeeder::class);
<<<<<<< HEAD
         $this->call(SleeveTableSeeder::class);
         $this->call(FitTableSeeder::class);
         $this->call(LegLengthTableSeeder::class);
         $this->call(TagsTableSeeder::class);
=======
         $this->call(TagsTableSeeder::class);
         $this->call(BrandTableSeeder::class);
         $this->call(AttributesTableSeeder::class);
>>>>>>> defae7d00f151b4aa9a4f8f1f5ec0d9319a42ab4
         $this->call(ProductsTableSeeder::class);
         $this->call(SliderTableSeeder::class);
         $this->call(BannersTableSeeder::class);
         $this->call(PromotionsTableSeeder::class);
         $this->call(BlogsTableSeeder::class);
         $this->call(TestimonialsSeeder::class);
         $this->call(PagesTableSeeder::class);
        
        
    }
}
