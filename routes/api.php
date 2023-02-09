<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DamageLevelController;
use App\Http\Controllers\DisastersController;

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
Route::get('/cities', [CityController::class, 'index']);
Route::get('/damage-level', [DamageLevelController::class, 'index']);
Route::post('/damage-level', [DamageLevelController::class, 'store']);
Route::get('/disasters', [DisastersController::class, 'index']);
Route::post('/disasters', [DisastersController::class, 'store']);
