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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/news', 'HomeController@news')->name('news');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [
        'as'         => 'admin.index',
        'middleware' => 'permissions',
        'uses'       => 'HomeController@admin'
    ]);

    Route::get('/user', [
        'as'   => 'user.index',
        'uses' => 'HomeController@user'
    ]);
});


