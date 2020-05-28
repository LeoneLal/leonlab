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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'JeuxController@search')->name('jeux.search');
Route::get('/', 'JeuxController@index')->name('jeux.index');

Route::get('/console/{id}', 'ConsolesController@search')->name('consoles.search');

Route::put('/jeux/{id}/update', 'JeuxController@update')->name('jeux.update');
Route::get('/jeux/{id}/edit', 'JeuxController@edit')->name('jeux.edit');
Route::get('/jeux/{id}/show', 'JeuxController@show')->name('jeux.show');
Route::get('/jeux/create', 'JeuxController@create')->name('jeux.create');
Route::post('/jeux/store', 'JeuxController@store')->name('jeux.store');

