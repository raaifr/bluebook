<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'post'], function () {
    Route::get('create', 'PostController@create')->name('post.create');
    Route::post('save', 'PostController@store')->name('post.save');
    Route::get('show/{id}', 'PostController@show')->name('post.show');
    Route::get('edit/{post}', 'PostController@edit')->name('post.edit');
    Route::get('remove/{post}', 'PostController@destroy')->name('post.delete');
    Route::post('update', 'PostController@update')->name('post.update');
    Route::get('like/{id}', 'PostController@putlike')->name('post.like');
    Route::post('comment', 'PostController@comment')->name('post.comment');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'ProfileController@index')->name('user.profile');
    Route::get('viewposts', 'ProfileController@viewposts')->name('user.viewposts');
    Route::get('viewcomments', 'ProfileController@viewcomments')->name('user.viewcomments');
});



