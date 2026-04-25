<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ApplicationApiController;

route::Post('/login' , [LoginApiController::class , 'login']);

Route::middleware(['jwt.verify'])->group(function () {
    route::Post('/logout' , [LoginApiController::class , 'logout']);
});

Route::get('/products-listing' , [ProductApiController::class, 'GetAllProducts']); 
Route::get('/product-details/{id}', [ProductApiController::class, 'productDetails']);
Route::get('/relevent-products/{id}' , [ProductApiController::class , 'releventProducts']);
Route::Post('/inquiry' , [ProductApiController::class , 'inquiryStore']);

Route::get('/filter-list' , [ApplicationApiController::class , 'filterList']);
Route::get('/filter-product' , [ProductApiController::class , 'FilterProduct']);