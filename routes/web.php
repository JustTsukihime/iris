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
    return redirect('login');
});

Auth::routes();

Route::get('/register', function () {
    return redirect()->home(); // Add registration via invites only
});

Route::get('/home', 'InfoScreenController@index')->name('home');
Route::get('/gis', 'InfoScreenController@getUpdates')->name('infoscreen.updates');
Route::resource('infoscreen', 'InfoScreenController');
Route::prefix('infoscreen/{infoscreen}')->group(function () {
    Route::get('slides', 'InfoScreenController@slides')->name('infoscreen.slides');
    Route::resource('slide', 'InfoScreenSlideController');
    Route::resource('slideshow', 'InfoScreenSlideShowController');
});


