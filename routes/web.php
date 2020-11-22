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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

//СУМКИ
Route::post('/bag/create', 'BagController@create')->name('bag.create');
Route::get('/bag/create', 'BagController@create_view')->name('bag.create_view');
Route::get('/bag', 'BagController@print')->name('bag.print');
Route::delete('/bag/{bag}', 'BagController@destroy')->name('bag.destroy');
Route::patch('/bagedit/{bag}', 'BagController@edit')->name('bag.edit');
Route::patch('/bagupdate/{bag}', 'BagController@update')->name('bag.update');

//ПРЕДМЕТЫ
Route::post('/item/create', 'ItemController@create')->name('item.create');
Route::get('/item/create', 'ItemController@create_view')->name('item.create_view');
Route::get('/item', 'ItemController@print')->name('item.print');
Route::delete('/item/{item}', 'ItemController@destroy')->name('item.destroy');
Route::patch('/itemedit/{item}', 'ItemController@edit')->name('item.edit');
Route::patch('/itemupdate/{item}', 'ItemController@update')->name('item.update');

Route::get('/home', 'HomeController@index')->name('home');


