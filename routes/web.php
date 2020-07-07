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

//navigates to Home Page
Route::get('/', 'PagesController@index');  

//navigates to About Page
Route::get('/about', 'PagesController@about');

//navigates to Services Page
Route::get('/services','PagesController@services');

//To get all the methods running in PostsController
Route::resource('posts','PostsController');