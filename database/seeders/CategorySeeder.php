<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["Yazılım", "Yemek", "Sanat", "Bilim"," Eğlence"];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
                'slug' => str()->slug($category)
            ]);
        }
    }
}
