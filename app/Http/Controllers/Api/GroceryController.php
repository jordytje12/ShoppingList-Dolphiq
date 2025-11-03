<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroceryRequest;
use App\Http\Requests\UpdateGroceryRequest;
use App\Http\Resources\GroceryResource;
use App\Models\Grocery;
use App\Models\ShoppingList;

class GroceryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroceryRequest $request, ShoppingList $shoppingList)
    {
        $grocery = $shoppingList->groceries()->create($request->validated());

        return (new GroceryResource($grocery))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroceryRequest $request, Grocery $grocery)
    {
        $grocery->update($request->validated());

        return new GroceryResource($grocery);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grocery $grocery)
    {
        $grocery->delete();

        return response()->noContent();
    }
}
