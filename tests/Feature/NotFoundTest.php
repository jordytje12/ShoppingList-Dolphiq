<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

it('returns 404 when shopping list not found', function () {
    $this->getJson('/api/shopping-lists/999')
        ->assertNotFound();
});

it('returns 404 when updating non-existent grocery', function () {
    $this->patchJson('/api/groceries/999', [
        'quantity' => 2,
    ])->assertNotFound();
});
