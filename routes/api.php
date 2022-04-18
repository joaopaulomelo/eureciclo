<?php

use App\Http\Controllers\PurchaseHistoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->group(function () {
    Route::post('/file/update', [PurchaseHistoryController::class, 'process']);
    Route::get('/purchase', [PurchaseHistoryController::class, 'list']);
    Route::post('/purchase', [PurchaseHistoryController::class, 'create']);
    Route::put('/purchase/{id}', [PurchaseHistoryController::class, 'update']);
    Route::get('/purchase/{id}', [PurchaseHistoryController::class, 'show']);
    Route::delete('/purchase/{id}', [PurchaseHistoryController::class, 'destroy']);

});


