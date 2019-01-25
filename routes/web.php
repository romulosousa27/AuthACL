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

/*
    Route::get('/', function () {
        return view('welcome');
    });
*/
Route::get('/', 'UserController@home')->name('home');
Route::get('/register', 'UserController@register')->name('register');
Route::post('/store', 'UserController@store')->name('store');

Route::get('/login', 'AuthenticateController@login')->name('login');
Route::post('/logar', 'AuthenticateController@logar')->name('logar');
Route::get('/logout', 'AuthenticateController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'AuthenticateController@dashboard')->name('dashboard');
    Route::get('/dashboard/users', 'UserController@list')->name('list');
    Route::get('/dashboard/users/{id}/edit', 'UserController@edit')->name('edit');
});

