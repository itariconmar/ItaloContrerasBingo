<?php

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

Route::get('getCard','GenerateCardsController@generateCard');
Route::get('getOneNumber','CallNumbersController@callOneNumber');
Route::get('getAllNumbers','CallNumbersController@callAllNumbers');

Route::get('toValidate','CheckCardsController@toGame');
Route::get('getValidation','CheckCardsController@toCheck');
