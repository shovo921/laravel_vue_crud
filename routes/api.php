<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustromerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', [CustromerController::class, 'index']);
Route::get('/getdata', [CustromerController::class, 'getdata']);
Route::get('/show/{id}', [CustromerController::class, 'show']);
Route::get('/delete/{id}', [CustromerController::class, 'delete']);
Route::post('/update/{id}', [CustromerController::class, 'update']);
Route::post('/postdata', [CustromerController::class, 'postdata']);
Route::get('/search/{data}', [CustromerController::class, 'search']);
