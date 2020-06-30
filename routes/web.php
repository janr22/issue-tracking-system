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

Route::view('/', 'pages.home')->name('home');

Route::view('/create', 'pages.create')->name('create');
Route::view('/users', 'pages.users')->name('create');

Route::group(['middleware' => 'guest'], function () {
    Route::get('login/google', 'Auth\LoginController@redirectToProvider');
    Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
});


Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});
