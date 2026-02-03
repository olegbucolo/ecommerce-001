<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::withoutVerifying()->get('https://fakestoreapi.com/products');

        if (! $response->successful()) {
            return;
        }

        foreach ($response->json() as $item) {
            Product::create([
                'title' => $item['title'],
                'price' => $item['price'],
                'description' => $item['description'],
                'category' => $item['category'],
                'image' => $item['image'],
                'rating_rate' => $item['rating']['rate'] ?? 0,
                'rating_count' => $item['rating']['count'] ?? 0,
            ]);
        }
    }
}
