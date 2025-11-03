<?php

use App\Models\Grocery;
use App\Models\ShoppingList;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

it('can create a shopping list', function () {
    $response = $this->postJson('/api/shopping-lists', [
        'name' => 'Shopping List',
        'date' => '2025-10-28',
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure([
            'data' => ['id', 'name', 'date']
        ]);

    $this->assertDatabaseHas('shopping_lists', [
        'name' => 'Shopping List',
        'date' => '2025-10-28',
    ]);
});

it('can add product to shopping list', function () {
    $shoppingList = ShoppingList::factory()->create();

    $response = $this->postJson("/api/shopping-lists/{$shoppingList->id}/groceries", [
        'name' => 'Milk',
        'quantity' => 1,
    ]);

    $response->assertCreated()
        ->assertJson([
            'data' => [
                'name' => 'Milk',
                'quantity' => 1,
            ]
        ]);

    expect($shoppingList->groceries()->count())->toBe(1);
});

it('can update grocery quantity', function () {
    $grocery = Grocery::factory()->create(['quantity' => 1]);

    $response = $this->patchJson("/api/groceries/{$grocery->id}", [
        'quantity' => 2,
    ]);

    $response->assertOk();
    expect($grocery->fresh()->quantity)->toBe(2);
});

it('can delete grocery', function () {
    $grocery = Grocery::factory()->create();

    $response = $this->deleteJson("/api/groceries/{$grocery->id}");

    $response->assertNoContent();
    expect(Grocery::find($grocery->id))->toBeNull();
});

it('can retrieve all products from a shopping list', function () {
    $shoppingList = ShoppingList::factory()
        ->has(Grocery::factory()->count(3), 'groceries')
        ->create();

    $response = $this->getJson("/api/shopping-lists/{$shoppingList->id}");

    $response->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'quantity'],
            ]
        ]);
    expect($response->json('data'))->toHaveCount(3);
});
