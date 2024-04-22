<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [1, 2, 3];
        $imageUrls = [
            'images/chocolate3.png',
            'images/chocolate2.png',
            'images/chocolate1.png',
        ];

        $products = [];
        for ($i = 0; $i < 10; $i++) {
            $products[] = [
                'name' => 'Product ' . ($i + 1),
                'description' => 'Description for Product ' . ($i + 1),
                'price' => rand(5, 20) + rand(0, 99) / 100, // Генерация случайной цены от 5 до 20 с двумя знаками после запятой
                'image_url' => $imageUrls[$i % count($imageUrls)],
                'category_id' => $categories[$i % count($categories)],
            ];
        }

        DB::table('products')->insert($products);
    }
}
