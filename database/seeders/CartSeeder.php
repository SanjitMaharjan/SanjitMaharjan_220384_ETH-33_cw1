<?php

namespace Database\Seeders;

use App\Models\Cart;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $orderedItemNumber = 10;
        $cartItems = [];
        for ($i = 0; $i < $orderedItemNumber; $i++) {
            array_push($cartItems, [
                "product_id" => $faker->unique(true)->numberBetween(20230001, 20230011),
                "user_id" => $faker->unique(true)->numberBetween(2, 4),
                "delivered" => $faker->boolean(),
                "ordered" => true,
            ]);
        }

        foreach ($cartItems as $item) {
            Cart::create([
                "product_id" => $item['product_id'],
                "user_id" => $item['user_id'],
                "delivered" => $item["delivered"],
                "ordered" => $item["ordered"]
            ]);
        }
    }
}
