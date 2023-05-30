<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::get('/about_me', function() {
    return view('aboutMe');
});

Route::get('/hobby', function() {
    return view('hobby');
});

Route::get('/education', function() {
    return view('education');
});

Route::get('/album', function() {
    return view('album');
});

/* Route::get('main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('aboutMe', 'App\Http\Controllers\AboutMeController@index')->name('aboutMe.index'); */
