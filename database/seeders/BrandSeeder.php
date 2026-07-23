<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = ['Samsung', 'Nestle', 'Nike', 'IKEA', 'Pilot'];

        foreach ($brands as $name) {
            Brand::create([
                'name' => $name,
                'description' => "{$name} brand",
                'status' => true,
            ]);
        }
    }
}