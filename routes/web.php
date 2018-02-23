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

Route::get('home', 'ScreenController@index')->name('home');
Route::resource('screen', 'ScreenController');
Route::prefix('screen/{screen}')->group(function () {
    Route::get('slides', 'ScreenController@slides')->name('screen.slides');
    Route::resource('slide', 'SlideController');
    Route::resource('slideshow', 'SlideShowController');
});

Route::post('mmsct', 'MattermostSlashCommandTest@test');
