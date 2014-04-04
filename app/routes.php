<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Basic controllers routes
Route::get('/', 'HomeController@getHome');

// Restful controllers routes
Route::controller('home', 'HomeController');
Route::controller('users', 'UsersController');

// Resource controllers routes
Route::resource('timelines', 'TimelinesController');
Route::resource('comments', 'CommentsController');
Route::resource('persons', 'PersonsController');
Route::resource('friends', 'FriendsController');
