<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function () {
    Route::get('auth/check-unique-login', 'App\Http\Controllers\Api\RegisteredUserController@checkUniqueLogin')->name('auth.checkUniqueLogin');
    Route::post('blog/update', 'App\Http\Controllers\Api\BlogController@update')->name('blog.update');
    Route::post('blog/comments', 'App\Http\Controllers\Api\BlogCommentController@store')->name('comment.store');
});
