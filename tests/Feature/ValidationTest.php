<?php

use App\Models\Grocery;
use App\Models\ShoppingList;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

it('requires name and date when creating a shopping list', function () {
    $response = $this->postJson('/api/shopping-lists', []);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'date']);
});

it('requires positive quantity for groceries', function () {
    $shoppingList = ShoppingList::factory()->create();

    $this->postJson("/api/shopping-lists/{$shoppingList->id}/groceries", [
        'name' => 'Milk',
        'quantity' => -1,
    ])->assertStatus(422)
        ->assertJsonValidationErrors(['quantity']);
});

it('requires a valid date format', function () {
    $response = $this->postJson('/api/shopping-lists', [
        'name' => 'Shopping List',
        'date' => 'invalid-date',
    ])->assertStatus(422)
    ->assertJsonValidationErrors(['date']);
});

it('requires name and quantity when adding grocery', function () {
    $shoppingList = ShoppingList::factory()->create();

    $this->postJson("/api/shopping-lists/{$shoppingList->id}/groceries", [])
        ->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'quantity']);
});

it('requires positive quantity when updating grocery', function () {
    $grocery = Grocery::factory()->create([
        'quantity' => 1
    ]);
    $this->patchJson("/api/groceries/{$grocery->id}", [
        'quantity' => -1,
    ])->assertStatus(422)
        ->assertJsonValidationErrors(['quantity']);
});
