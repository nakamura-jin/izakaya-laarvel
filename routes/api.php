<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register']);
Route::get('/menu', [MenuController::class, 'index']);


Route::group(['middleware' => 'auth:sanctum'], function () {

    //staff
    Route::get('/member', [UserController::class, 'index']);
    Route::get('/member/{id}', [UserController::class, 'show']);
    Route::put('/member/{id}', [UserController::class, 'update']);
    Route::delete('/member/{id}', [UserController::class, 'destroy']);

    // user
    Route::get('/user_list', [UserController::class, 'userList']);

    // menu
    Route::post('/menu', [MenuController::class, 'store']);
    Route::post('/menu/upload', [MenuController::class, 'upload']);
    Route::get('/menu/{id}', [MenuController::class, 'show']);
    Route::put('/menu/{id}', [MenuController::class, 'update']);
    Route::delete('/menu/{id}', [MenuController::class, 'destroy']);

    //cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart', [CartController::class, 'store']);
    Route::put('/cart/{id}', [CartController::class, 'update']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy']);
    Route::get('/{id}/cart', [CartController::class, 'userCart']);
    Route::delete('/{id}/cart', [CartController::class, 'userCartDelete']);


    //order
    Route::post('/{id}/order', [OrderController::class, 'create']);
});

Route::get('/order', [OrderController::class, 'index']);
Route::put('/order/cooked/{id}', [OrderController::class, 'cooked']);
Route::put('/order/{id}', [OrderController::class, 'update']);
Route::get('/order/{id}', [OrderController::class, 'show']);

Route::put('/order/list/{id}', [OrderController::class, 'listDelete']);
Route::get('/menu/tag/{id}', [MenuController::class, 'selectMenu']);







