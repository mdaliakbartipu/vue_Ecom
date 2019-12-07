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
        //  $this->call(GroupsTableSeeder::class);
        //  $this->call(CompaniesTableSeeder::class);
        //  $this->call(CompanyDetailsTableSeeder::class);
        //  $this->call(CompanyBankAccountTableSeeder::class);
        //  $this->call(UsersTableSeeder::class);
        //  $this->call(CatagoryTableSeeder::class);
        //  $this->call(SubCatagoryTableSeeder::class);
        //  $this->call(SubSubCatagoryTableSeeder::class);
        //  $this->call(ColorTableSeeder::class);
        //  $this->call(SizeTableSeeder::class);
        //  $this->call(SleeveTableSeeder::class);
        //  $this->call(FitTableSeeder::class);
        //  $this->call(LegLengthTableSeeder::class);
        //  $this->call(ProductsTableSeeder::class);
        //  $this->call(SliderTableSeeder::class);
        //  $this->call(BannersTableSeeder::class);
        //  $this->call(PromotionsTableSeeder::class);
        //  $this->call(BlogsTableSeeder::class);
        //  $this->call(TestimonialsSeeder::class);
         $this->call(TagsTableSeeder::class);
        
        
    }
}
