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
use Illuminate\Support\Arr;

Route::get('/', function () {
    $a =  Arr::collapse([['name' => 'Desk', 'price' => null], ['a'=>' Kamar']]);
    dd($a);


    return view('welcome');
});

Route::get('test', function (){
    dd(is_id_term('id:1'));
});

Route::get('/posts', 'PostsController@index');
Route::get('/soap', 'SoapController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
