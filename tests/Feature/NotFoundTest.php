<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

//it('returns 404 for non-existent shopping list')
//it('returns 404 when updating non-existent product')

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
