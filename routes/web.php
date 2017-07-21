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
Auth::routes();

Route::get('/markAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
});

Route::get('/', function () {
    return view('calisoft.global.home');
})->middleware('auth')->name('home');
