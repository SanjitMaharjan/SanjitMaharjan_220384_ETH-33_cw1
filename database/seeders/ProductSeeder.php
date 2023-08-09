<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $products = [
            [
                "id" => 20230001,
                "category_id" => 1,
                "name" => "Tshirt",
                "description" => "This is tshirt",
                "price" => 1000,
                "image" => $faker->imageUrl(640, 480, 'cats'),
            ],
            [
                "id" => 20230002,
                "category_id" => 2,
                "name" => "Tshirt",
                "description" => "This is tshirt",
                "price" => 1000,
                "image" => $faker->imageUrl(640, 480, 'cats'),
            ],
            [
                "id" => 20230003,
                "category_id" => 2,
                "name" => "Tshirt",
                "description" => "This is tshirt",
                "price" => 1000,
                "image" => $faker->imageUrl(640, 480, 'cats'),
            ]
        ];
        foreach ($products as $product) {
            Product::create([
                "id" => $product["id"],
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
            ]);
        }
    }
}
