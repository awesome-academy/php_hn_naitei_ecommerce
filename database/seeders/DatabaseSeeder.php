<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Images;
use App\Models\Product;
use App\Models\User;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Images::truncate();
        Product::truncate();
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Category::factory(5)->create();
        HomeCategory::factory(1)->create();
        User::factory(1)->create();
        Product::factory()
            ->count(50)
            ->has(Images::factory()->count(6))
            ->create();
    }
}
