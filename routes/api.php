<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\NewsController;
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

Route::get('product/get',[ProductController::class,'index'])->name('index');
Route::get('product/store',[ProductController::class,'store'])->name('store');

Route::get('user/get',[UserController::class,'index'])->name('index');
Route::get('user/store',[UserController::class,'store'])->name('store');

Route::get('news/get',[NewsController::class,'index'])->name('index');
Route::get('news/store',[NewsController::class,'store'])->name('store');
