<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = Category::pluck('id')->all();
        $brandIds = Brand::pluck('id')->all();

        if (empty($categoryIds)) {
            return;
        }

        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => "Product {$i}",
                'sku' => 'SKU-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'brand_id' => !empty($brandIds) ? $brandIds[array_rand($brandIds)] : null,
                'unit' => 'pcs',
                'purchase_price' => rand(100, 500),
                'sale_price' => rand(600, 1000),
                'stock_quantity' => rand(10, 100),
                'reorder_level' => 5,
                'description' => "Description for product {$i}",
                'status' => true,
            ]);
        }
    }
}