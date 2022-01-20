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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');

Route::middleware('auth:sanctum')->group(function () {
	Route::post('/create-customer', 'App\Http\Controllers\CustomerController@create');
	Route::post('/find-customer', 'App\Http\Controllers\CustomerController@find');
	Route::post('/delete-customer', 'App\Http\Controllers\CustomerController@delete');
});
