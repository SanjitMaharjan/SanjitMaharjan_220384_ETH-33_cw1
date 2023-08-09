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
                "title" => "Title1",
            ],
            [
                "id" => 2,
                "title" => "Title2",
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
