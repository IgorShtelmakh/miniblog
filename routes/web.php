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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/view/{post}', 'HomeController@view')->name('viewpost');
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/create', 'PostController@create')->name('post.create');
Route::post('/post', 'PostController@store');
Route::post('/post/{post}', 'PostController@store');
Route::delete('/post/{post}', 'PostController@destroy');
Route::patch('/post/{post}', 'PostController@update')->name('post.update');
