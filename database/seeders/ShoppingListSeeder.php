<?php

namespace Database\Seeders;

use App\Models\ShoppingList;
use Database\Factories\ShoppingListFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoppingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShoppingList::factory()->create();
    }
}
