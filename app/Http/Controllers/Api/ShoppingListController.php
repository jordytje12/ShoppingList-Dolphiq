<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShoppingListRequest;
use App\Http\Resources\GroceryResource;
use App\Http\Resources\ShoppingListResource;
use App\Models\ShoppingList;

class ShoppingListController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShoppingListRequest $request)
    {
        $list = ShoppingList::create($request->validated());

        return (new ShoppingListResource($list))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShoppingList $shoppingList)
    {
        return GroceryResource::collection($shoppingList->groceries);
    }
}
