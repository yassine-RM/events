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
//------------------------------------------------------------------
Route::resource('event', 'EventController');
Route::resource('contact', 'ContactController');
Route::resource('user', 'UserController');
//-------------------------------------------------------------------
Route::post('login', 'UserController@login')->name('user.login');
Route::get('logOut', 'UserController@logOut')->name('user.logOut');
//-------------------------------------------------------------------
Route::redirect('/', route('event.index'), 301);