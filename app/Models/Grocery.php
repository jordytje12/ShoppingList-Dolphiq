<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grocery extends Model
{
    /** @use HasFactory<\Database\Factories\GroceryFactory> */
    use HasFactory;

    protected $fillable = ['shopping_list_id', 'name', 'quantity'];

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }
}
