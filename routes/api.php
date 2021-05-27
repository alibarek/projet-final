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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:api')->get('/', function (Request $request) {
    return $request->user();
});


Route::post('login', 'App\Http\Controllers\API\WebUserController@login');
Route::post('register', 'App\Http\Controllers\API\WebUserController@register');
Route::apiResource('users', App\Http\Controllers\API\WebUserController::class);//->middleware('auth:api');
Route::apiResource('doctors', App\Http\Controllers\API\DoctorController::class);//->middleware('auth:api');
Route::patch('updateDoctor/{id}', 'App\Http\Controllers\API\DoctorController@updateDoctor');