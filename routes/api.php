<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;


Route::controller(ItemController::class)->group(function () {
    Route::get('/items', 'get');
    Route::post('/items', 'store');
    Route::get('/items/{id}', 'details');
    Route::patch('/items/{id}', 'update');
    Route::delete('/items/{id}', 'destroy');
});

Route::controller(ItemTypeController::class)->group(function () {
    Route::get('/item_types', 'get');
    Route::post('/item_types', 'store');
    Route::get('/item_types/{id}', 'details');
    Route::patch('/item_types/{id}', 'update');
    Route::delete('/item_types/{id}', 'destroy');
});

Route::controller(PurchaseController::class)->group(function () {
    Route::post('/purchases', 'store');
    Route::get('/purchases', 'get');
    Route::get('/purchases/{id}', 'details');
});
