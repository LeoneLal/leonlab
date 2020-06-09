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

Route::get('/', function () { return view('welcome'); });

Auth::routes();

/**
 * Account route
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin panel route
 */
Route::get('/admin', 'AdminController@index')->name('admin.index');

/**
 * User routes
 */
Route::get('/user/edit_solde', 'UserController@edit_solde')->name('user.edit_solde');
Route::put('/user/update_solde', 'UserController@update_solde')->name('user.update_solde');
Route::put('/user/update_profil', 'UserController@update_profil')->name('user.update_profil');

/**
 * Consoles routes
 */
Route::get('/console/{id}', 'ConsolesController@search')->name('consoles.search');
Route::get('/consoles/create', 'ConsolesController@create')->name('consoles.create');
Route::post('/consoles/store', 'ConsolesController@store')->name('consoles.store');

/**
 * Games Routes
 */
Route::get('/search', 'JeuxController@search')->name('jeux.search');
Route::get('/', 'JeuxController@index')->name('jeux.index');
Route::put('/jeux/{id}/update', 'JeuxController@update')->name('jeux.update');
Route::get('/jeux/{id}/edit', 'JeuxController@edit')->name('jeux.edit');
Route::get('/jeux/{id}/show', 'JeuxController@show')->name('jeux.show');
Route::get('/jeux/create', 'JeuxController@create')->name('jeux.create');
Route::post('/jeux/store', 'JeuxController@store')->name('jeux.store');

/**
 * Cart routes
 */
Route::get('/panier', 'CartController@index')->name('cart.index');
Route::post('/cart/create', 'CartController@store')->name('cart.store');
Route::delete('/cart/{rowId}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/pay', 'CartController@pay')->name('cart.pay');
Route::get('/videpanier', function(){ Cart::destroy(); });


Auth::routes();

