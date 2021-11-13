<?php

use App\Http\Controllers\API\AuthController;
// use App\Http\Controllers\API\WisataController;
use App\Http\Controllers\WisataController;
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
// Denngan authentikasi
// Route::post('login', [AuthController::class, 'signin']);
// Route::post('register', [AuthController::class, 'signup']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::resource('wisata', WisataController::class);
// });

// Tanpa Authentikasi
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('wisata', [WisataController::class, 'index']);
Route::post('wisata', [WisataController::class, 'create']);
Route::put('wisata/{id}', [WisataController::class, 'update']);
Route::delete('wisata/{id}', [WisataController::class, 'delete']);
Route::post('/add', [ClientController::class, 'addData']);