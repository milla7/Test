<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');

Route::middleware('auth:sanctum')->group(function () {
	Route::post('/create-customer', 'App\Http\Controllers\CustomerController@create');
	Route::post('/find-customer', 'App\Http\Controllers\CustomerController@find');
	Route::post('/delete-customer', 'App\Http\Controllers\CustomerController@delete');
});
