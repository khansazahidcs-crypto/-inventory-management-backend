<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Supplier::create([
                'name' => "Supplier {$i}",
                'company_name' => "Supplier Co {$i}",
                'email' => "supplier{$i}@example.com",
                'phone' => "030000000{$i}",
                'address' => "Street {$i}, City",
                'city' => "City {$i}",
                'country' => 'Pakistan',
                'status' => true,
            ]);
        }
    }
}