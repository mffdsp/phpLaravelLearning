<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/teste02', 'StudentController@create');

Route::get('/teste01', function () {
    return view('alunos');
});