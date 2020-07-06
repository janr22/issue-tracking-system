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


Route::get('/', 'TicketController@index')->name('home');
Route::get('/create', 'TicketController@create');
Route::get('/{id}', 'TicketController@show');
Route::post('/', 'TicketController@store')->name('store');


Route::group(['middleware' => 'guest'], function () {
    Route::get('login/google', 'Auth\LoginController@redirectToProvider');
    Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/{id}/assignee', 'TicketController@assignee')->name('assignee');
    Route::post('/{id}/status', 'TicketController@status')->name('status');
    Route::post('/{id}/confidentiality', 'TicketController@confidentiality')->name('confidentiality');
    Route::post('/{id}/lock', 'TicketController@lock')->name('lock');
});

Route::group(['middleware' => 'admin'], function () {
    Route::view('/users', 'pages.users')->name('create');
});
