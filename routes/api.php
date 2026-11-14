<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ApplicationApiController;
use App\Http\Controllers\Api\SparePartsApiController;

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

Route::prefix('v1')->group(function () {
    Route::get('/spare-parts/machines', [SparePartsApiController::class, 'machines']);
    Route::get('/spare-parts/machines/{machine_id}/parts', [SparePartsApiController::class, 'machineParts'])->whereNumber('machine_id');
    Route::get('/spare-parts/{part_id}', [SparePartsApiController::class, 'partDetails'])->whereNumber('part_id');
    Route::post('/inquiry/submit', [SparePartsApiController::class, 'submitInquiry']);
    Route::get('/spare-parts/master-dump', [SparePartsApiController::class, 'masterDump']);
});