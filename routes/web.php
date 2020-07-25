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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard','HomeController@index');
Route::get('/human/create', 'HumanController@index');
Route::post('/human/create', 'HumanController@store');
Route::get('human/edit/{human}', 'HumanController@edit');
Route::put('human/{human}', 'HumanController@update');
Route::delete('/human/{human}', 'HumanController@destroy');

Route::get('/animal/create', 'AnimalController@index');
Route::post('/animal/create', 'AnimalController@store');
Route::get('animal/edit/{animal}', 'AnimalController@edit');
Route::put('animal/{animal}', 'AnimalController@update');
Route::delete('/animal/{animal}', 'AnimalController@destroy');