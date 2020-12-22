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


Route::get('/teste01', 'App\Http\Controllers\StudentController@get');
Route::post('/teste01', 'App\Http\Controllers\StudentController@post');


Route::delete('/teste01/{id}', 'App\Http\Controllers\StudentController@delete');
Route::get('/teste01/{id}', 'App\Http\Controllers\StudentController@get');
Route::put('/teste01/{id}', 'App\Http\Controllers\StudentController@put');
