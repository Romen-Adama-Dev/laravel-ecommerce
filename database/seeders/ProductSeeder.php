<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = Category::pluck('id')->all();

        Product::factory()
            ->count(60)
            ->state(fn () => [
                'category_id' => $categoryIds[array_rand($categoryIds)],
            ])
            ->create();
    }
}