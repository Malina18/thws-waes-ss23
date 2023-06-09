<?php

use App\Http\Controllers\CheckListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CheckListController::class)->group(function(){
    Route::get('/check-lists', 'index');
    Route::get('/check-lists/{id}', 'show');
    Route::post('/check-lists/{id}', 'create');
    Route::patch('/check-lists/{id}', 'update');
    Route::delete('/check-lists/{id}', 'delete');
});

Route::controller(CheckListControllerItems::class)->group(function(){
    Route::get('/check-lists-items/{id}', 'show');
    Route::post('/check-lists-items', 'create');
    Route::patch('/check-lists-items/{id}', 'update');
    Route::delete('/check-lists-items/{id}', 'delete');
});
