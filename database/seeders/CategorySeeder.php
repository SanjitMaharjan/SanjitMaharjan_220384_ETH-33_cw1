<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "id" => 1,
                "title" => "Shirt",
            ],
            [
                "id" => 2,
                "title" => "T-Shirt",
            ],
            [
                "id" => 3,
                "title" => "Hoodie",
            ],
            [
                "id" => 4,
                "title" => "Jacket",
            ],
            [
                "id" => 5,
                "title" => "Sweater",
            ],
        ];
        foreach ($categories as $category) {
            Category::create([
                "id" => $category['id'],
                "title" => $category['title'],
            ]);
        }
    }
}
