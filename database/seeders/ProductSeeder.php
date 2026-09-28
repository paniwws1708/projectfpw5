<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil kategori Sembako (atau default kategori pertama)
        $sembako = Category::where('name', 'Sembako')->first() ?? Category::first();

        $products = [
            [
                'code' => 'P006',
                'name' => 'Gula Pasir 1kg',
                'unit' => 'kg',
                'price' => 16000,
                'stock' => 30,
            ],
            [
                'code' => 'P001',
                'name' => 'Pensil',
                'unit' => 'pcs',
                'price' => 3000,
                'stock' => 20,
            ],
            [
                'code' => 'P002',
                'name' => 'Buku',
                'unit' => 'pcs',
                'price' => 5000,
                'stock' => 5,
            ],
            [
                'code' => 'P003',
                'name' => 'Pulpen',
                'unit' => 'pcs',
                'price' => 2000,
                'stock' => 0,
            ],
            [
                'code' => 'P004',
                'name' => 'Beras Premium 5kg',
                'unit' => 'sak',
                'price' => 75000,
                'stock' => 20,
            ],
            [
                'code' => 'P005',
                'name' => 'Minyak Goreng 2L',
                'unit' => 'pouch',
                'price' => 34000,
                'stock' => 15,
            ],
        ];

        foreach ($products as $item) {
            Product::create([
                'category_id' => $sembako->id,
                'code'        => $item['code'],
                'name'        => $item['name'],
                'unit'        => $item['unit'],
                'price'       => $item['price'],
                'stock'       => $item['stock'],
            ]);
        }
    }
}