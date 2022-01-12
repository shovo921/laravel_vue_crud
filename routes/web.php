<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustromerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [CustromerController::class, 'index']);
Route::get('/getdata', [CustromerController::class, 'getdata']);
Route::get('/show/{id}', [CustromerController::class, 'show']);
Route::get('/delete/{id}', [CustromerController::class, 'delete']);
Route::post('/update/{id}', [CustromerController::class, 'update']);
Route::post('/postdata', [CustromerController::class, 'postdata']);
