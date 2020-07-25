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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/humans', 'API\HumanController@index');
Route::post('/humans', 'API\HumanController@store');
Route::get('/humans/{human}', 'API\HumanController@show');
Route::put('/humans/{human}', 'API\HumanController@update');
Route::delete('/humans/{human}', 'API\HumanController@destroy');

Route::get('/animals', 'API\AnimalController@index');
Route::post('/animals', 'API\AnimalController@store');
Route::get('/animals/{animal}', 'API\AnimalController@show');
Route::put('/animals/{animal}', 'API\AnimalController@update');
Route::delete('/animals/{animal}', 'API\AnimalController@destroy');
