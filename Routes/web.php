<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/teste01', 'App\Http\Controllers\StudentController@index');
Route::post('/teste01', 'App\Http\Controllers\StudentController@post');


Route::delete('/teste01/{id}', 'App\Http\Controllers\StudentController@delete');
Route::get('/teste01/{id}', 'App\Http\Controllers\StudentController@get');
Route::put('/teste01/{id}', 'App\Http\Controllers\StudentController@put');
