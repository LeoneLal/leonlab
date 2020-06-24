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
Route::get('/admin/games', 'AdminController@games')->name('admin.games');
Route::get('/admin/consoles', 'AdminController@consoles')->name('admin.consoles');
Route::get('/admin/members', 'AdminController@members')->name('admin.members');
Route::get('/admin/opinion', 'AdminController@opinion')->name('admin.opinion');

/**
 * User routes
 */
Route::get('/user/edit_solde', 'UserController@edit_solde')->name('user.edit_solde');
Route::put('/user/update_solde', 'UserController@update_solde')->name('user.update_solde');
Route::put('/user/update_profil', 'UserController@update_profil')->name('user.update_profil');
Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
Route::put('/user/{id}/update', 'UserController@update')->name('user.update');
Route::get('/user/{id}/delete', 'UserController@delete')->name('user.delete');

/**
 * Consoles routes
 */
Route::get('/console/{id}', 'ConsolesController@search')->name('consoles.search');
Route::get('/consoles/create', 'ConsolesController@create')->name('consoles.create');
Route::post('/consoles/store', 'ConsolesController@store')->name('consoles.store');
Route::get('/consoles/{id}/edit', 'ConsolesController@edit')->name('consoles.edit');
Route::put('/consoles/{id}/update', 'ConsolesController@update')->name('consoles.update');
Route::get('/consoles/{id}/delete', 'ConsolesController@delete')->name('consoles.delete');

/**
 * Games Routes
 */
Route::get('/search', 'JeuxController@search')->name('jeux.search');
Route::get('/', 'JeuxController@index')->name('jeux.index');
Route::get('/jeux/create', 'JeuxController@create')->name('jeux.create');
Route::post('/jeux/store', 'JeuxController@store')->name('jeux.store');
Route::get('/jeux/{id}/show', 'JeuxController@show')->name('jeux.show');
Route::get('/jeux/{id}/edit', 'JeuxController@edit')->name('jeux.edit');
Route::put('/jeux/{id}/update', 'JeuxController@update')->name('jeux.update');
Route::get('/jeux/{id}/delete', 'JeuxController@delete')->name('jeux.delete');

/**
 * Cart routes
 */
Route::get('/panier', 'CartController@index')->name('cart.index');
Route::post('/cart/create', 'CartController@store')->name('cart.store');
Route::delete('/cart/{rowId}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/pay', 'CartController@pay')->name('cart.pay');
Route::get('/videpanier', function(){ Cart::destroy(); });

/**
 * Comments routes
 */
Route::post('/comments/create', 'CommentsController@store')->name('comments.create');
Route::post('/comments/store', 'CommentsController@store')->name('comments.store');

/**
 * Route receipt
 */
Route::get('/pdf', 'PdfController@receipt')->name('pdf.receipt');
Route::get('/download', 'PdfController@print')->name('pdf.print');
Route::get('/read/{number}', 'PdfController@download')->name('pdf.download');


Auth::routes();

