<?php

namespace Database\Seeders;

use App\Models\Wishlist;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wishlists = [
            [
                "product_id" => 20230003,
                "user_id" => 2
            ],
            [
                "product_id" => 20230001,
                "user_id" => 2
            ],
        ];
        foreach ($wishlists as $wishlist) {
            Wishlist::create([
                "product_id" => $wishlist['product_id'],
                "user_id" => $wishlist['user_id'],
            ]);
        }
    }
}
