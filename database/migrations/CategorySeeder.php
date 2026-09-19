<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
   public function run(): void
    {
        $categories = ['Sembako', 'Minuman', 'Makanan Ringan', 'Kebutuhan Rumah Tangga'];
        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}