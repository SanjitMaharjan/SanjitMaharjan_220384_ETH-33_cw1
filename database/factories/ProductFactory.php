<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'category_id'=>$this->faker->numberBetween(1,5),
            'name'=>$this->faker->word,
            'description'=>$this->faker->sentence,
            'price'=>$this->faker->numberBetween(1000,5000),
            'image' =>$this->faker->imageUrl(640, 480, 'cats')
        ];
    }
}
