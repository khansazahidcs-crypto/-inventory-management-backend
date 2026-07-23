<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Customer::create([
                'name' => "Customer {$i}",
                'email' => "customer{$i}@example.com",
                'phone' => "031000000{$i}",
                'address' => "Block {$i}, City",
                'customer_type' => $i % 2 === 0 ? 'wholesale' : 'retail',
                'status' => true,
            ]);
        }
    }
}