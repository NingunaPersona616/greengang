<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['category'=>'Higiene Personal']);
        Category::create(['category'=>'Canasta Basica']);
        Category::create(['category'=>'Medicicamentos']);
    }
}
