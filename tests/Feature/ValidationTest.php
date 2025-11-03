<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

//it('requires name when creating shopping list')
//it('requires valid date format')
//it('requires positive quantity for products')
//it('validates product exists before updating')

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
