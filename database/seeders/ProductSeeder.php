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
                "name" => " Casual Tshirt",
                "description" => "Casual Tshirt for men",
                "price" => 1000,
                "image" => 'test-Shirt.jpg',
            ],
            [
                "id" => 20230002,
                "category_id" => 2,
                "name" => "Luffy Tshirt",
                "description" => "Luffy Latest Tshirt",
                "price" => 1200,
                "image" => 'test-Tshirt.jpg',
            ],
            [
                "id" => 20230003,
                "category_id" => 2,
                "name" => "Anime Tshirt",
                "description" => "Best animie tshirt in market",
                "price" => 1500,
                "image" => 'test-Tshirt2.jpg',
            ],
            [
                "id" => 20230004,
                "category_id" => 4,
                "name" => "Lether Jacket",
                "description" => "Lether Jacket for Men",
                "price" => 5000,
                "image" => 'test-Jacket.webp',
            ],
            [
                "id" => 20230005,
                "category_id" => 3,
                "name" => "Anime Hoodie",
                "description" => "Printed anime hoodie",
                "price" => 2500,
                "image" => 'test-Hoodie.webp',
            ],
            [
                "id" => 20230006,
                "category_id" => 4,
                "name" => "Cargo Jacket",
                "description" => "Printed anime hoodie",
                "price" => 2500,
                "image" => 'test-Jacket2.webp',
            ],
            [
                "id" => 20230007,
                "category_id" => 4,
                "name" => "Red Jacket",
                "description" => "Printed anime hoodie",
                "price" => 2500,
                "image" => 'test-Jacket3.webp',
            ],
            [
                "id" => 20230008,
                "category_id" => 3,
                "name" => "PRO Classic Hoodie",
                "description" => "Printed anime hoodie",
                "price" => 2500,
                "image" => 'test-Hoodie2.jpg',
            ],
            [
                "id" => 20230009,
                "category_id"=> 1,
                "name" => "Red Shirt",
                "description" => "Printed anime hoodie",
                "price" => 2500,
                "image" => 'test-Shirt2.jpeg',
            ],
            [
                "id" => 20230010,
                "category_id" => 5,
                "name" => "Woolen Sweater",
                "description" => "Printed anime hoodie",
                "price" => 2500,
                "image" => 'test-sweater.webp',
            ],
            [
                "id" => 20230011,
                "category_id" => 5,
                "name" => "Woolen Sweater",
                "description" => "Printed anime hoodie",
                "price" => 2500,
                "image" => 'test-sweater2.jpg',
            ],
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
