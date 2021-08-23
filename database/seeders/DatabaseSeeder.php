<?php

namespace Database\Seeders;

use App\Models\Images;
use App\Models\Product;
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
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Product::factory()
            ->count(50)
            ->has(Images::factory()->count(6))
            ->create();
    }
}
