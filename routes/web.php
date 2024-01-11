<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

Route::get('/', [PizzaController::class, 'showPizzaList'])->name('pizza.list');
Route::post('/addToCart', [PizzaController::class, 'addToCart'])->name('addToCart');
Route::get('/get-toppings', [PizzaController::class, 'getToppings'])->name('get-toppings');
Route::get('/clear-cart', [PizzaController::class, 'clearCart'])->name('clearCart');
