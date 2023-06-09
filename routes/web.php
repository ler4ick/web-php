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

Route::get('/main', function () {
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

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/test', function() {
    return view('test');
});

Route::get('/guestBook', function () {
    return view('guestBook');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blogUpload', function () {
    return view('blogUpload');
});

Route::get('/', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('aboutMe', 'App\Http\Controllers\AboutMeController@index')->name('aboutMe.index');
Route::get('album', 'App\Http\Controllers\AlbumController@index')->name('album.index');
Route::get('hobby', 'App\Http\Controllers\HobbyController@index')->name('hobby.index');
Route::get('contact', 'App\Http\Controllers\ContactController@index')->name('contact.index');
Route::get('test', 'App\Http\Controllers\TestController@index')->name('test.index');
Route::get('guestBook', 'App\Http\Controllers\GuestBookController@index')->name('guestBook.index');
Route::get('guestBookUpload', 'App\Http\Controllers\GuestBookUploadController@index')->name('guestBookUpload.index');
Route::get('blog', 'App\Http\Controllers\BlogController@index')->name('blog.index');
Route::get('blogUpload', 'App\Http\Controllers\BlogUploadController@index')->name('blogUpload.index');

Route::post('contact', 'App\Http\Controllers\ContactController@checkAction');
Route::post('test', 'App\Http\Controllers\TestController@checkAction');

Route::post('guestBook', 'App\Http\Controllers\GuestBookController@store')->name('guestBook.store');
Route::post('guestBookUpload', 'App\Http\Controllers\GuestBookUploadController@upload')->name('guestBookUpload.upload');

Route::post('blog', 'App\Http\Controllers\BlogController@store')->name('blog.store');

Route::post('blogUpload', 'App\Http\Controllers\BlogUploadController@upload')->name('blogUpload.upload');
