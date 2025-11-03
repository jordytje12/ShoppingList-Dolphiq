<?php

namespace Database\Seeders;

use App\Models\Grocery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrocerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grocery::factory()->create();
    }
}
