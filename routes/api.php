<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\ShoppingListController;
use \App\Http\Controllers\Api\GroceryController;

//Endpoint that makes it possible to list all groceries from a shopping list (by id);
Route::get('/shopping-lists/{shopping_list}' , [ShoppingListController::class, 'show']);

//Rest endpoint to add a new shopping list with name and date;
Route::post('/shopping-lists', [ShoppingListController::class, 'store']);

//Rest endpoint to add groceries to a shopping list (by Id);
Route::post('/shopping-lists/{shopping_list}/groceries', [GroceryController::class, 'store']);

//Rest endpoint that makes it possible to change the amount of groceries (by Id);
Route::patch('/groceries/{grocery}', [GroceryController::class, 'update']);

//Rest endpoint that makes it possible to remove groceries (by Id).
Route::delete('/groceries/{grocery}', [GroceryController::class, 'destroy']);
