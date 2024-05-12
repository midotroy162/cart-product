<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ProductSeeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{

    public function run()
    {
      $faker = Faker::create();
     
        foreach (range(1, 10) as $index) {
            DB::table('products')->insert([
                'sku' => $faker->unique()->md5,
                'Name' => $faker->word,
                'price' =>  $faker->numberBetween($min = 1, $max = 1000),
                'description' =>  $faker->text,
                'Category' =>  $faker->word,
                'UnitsInStock' =>  $faker->numberBetween($min = 1, $max = 50),
            ]);
        }
    }
}
