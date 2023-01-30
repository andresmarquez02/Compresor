<?php

use Illuminate\Support\Facades\Route;

Route::get('/', "HomeController@index");
Route::get('download/{name}', 'HomeController@download');

