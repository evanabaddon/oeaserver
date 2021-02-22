<?php

use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\ProdiController;
use App\Http\Controllers\API\TransaksiController;
use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\API\UserController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::get('transaksi', [TransaksiController::class, 'all']);
    Route::post('transaksi/{id}', [TransaksiController::class, 'update']);
    Route::post('checkout', [TransaksiController::class, 'checkout']);
    Route::post('logout', [UserController::class, 'logout']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::get('prodi', [ProdiController::class, 'all']);
Route::get('kategori', [KategoriController::class, 'all']);
Route::post('midtrans/callback', [MidtransController::class, 'callback']);