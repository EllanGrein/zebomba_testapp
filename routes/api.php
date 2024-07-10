<?php

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

// Используем метод GET по условию задания (однако для таких запросов необходимо использовать метод POST)
Route::get('user_auth', 'App\Http\Controllers\AuthController@auth');
