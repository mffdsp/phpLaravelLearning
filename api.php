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

//students routes
Route::get('/students', 'StudentController@read');
Route::post('/students', 'StudentController@store');
Route::delete('/students', 'StudentController@delete');


Route::delete('/students/{id}', 'StudentController@delete');
Route::get('/students/{id}', 'StudentController@read');
Route::put('/students/{id}', 'StudentController@update');

//teachers routes:
Route::get('/teachers', 'TeacherController@read');
Route::post('/teachers', 'TeacherController@store');
Route::delete('/teachers', 'TeacherController@delete');


Route::delete('/teachers/{id}', 'TeacherController@delete');
Route::get('/teachers/{id}', 'TeacherController@read');
Route::put('/teachers/{id}', 'TeacherController@update');
