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

Route::get('/', 'RecipeController@index')->middleware('auth');

Route::get('/serch','RecipeController@serch')->middleware('auth');

Route::get('/post','RecipeController@postindex')->name('postindex')->middleware('auth');

Route::get('/post/{recipe}','RecipeController@postshow')->middleware('auth');

Route::resource("recipes", "RecipeController")->middleware('auth');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
