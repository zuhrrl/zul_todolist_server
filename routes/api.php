<?php

use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('task', [UserController::class, 'getAllTask']);
        Route::post('task/create', [UserController::class, 'createTask']);
        Route::post('task/update', [UserController::class, 'updateTask']);
        Route::post('task/delete', [UserController::class, 'deleteTask']);

    });
});
