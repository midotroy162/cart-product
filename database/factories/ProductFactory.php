<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $name = $this->faker->name;
        // return [
        //     'name'=>$name,
        //     'slug'=> Str::slug($name),
        //     'description'=>$this->faker->paragraph(),
        //     'price'=> $this->faker->randomNumber(2),
        //     'rating'=> $this->faker->randomFloat(2,0,10),
        //     'quantity'=> $this->faker->randomNumber(2),
        // ];
    }
}
