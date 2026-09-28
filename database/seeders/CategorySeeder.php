<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Sembako']);
        Category::create(['name' => 'Minuman']);
        Category::create(['name' => 'Makanan Ringan']);
        Category::create(['name' => 'Kebutuhan Rumah Tangga']);
    }
}