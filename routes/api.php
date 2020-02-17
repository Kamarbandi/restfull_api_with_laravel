<?php

use Illuminate\Http\Request;

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

//Route::get('country', 'CountryModel\CountryController@country');
//Route::get('country/{id}', 'CountryModel\CountryController@countryById');
//Route::post('country', 'CountryModel\CountryController@countrySave');
//Route::put('country/{id}', 'CountryModel\CountryController@countryUpdate');
//Route::delete('country/{id}', 'CountryModel\CountryController@countryDelete');

Route::apiResource('country', 'Country\Country');
