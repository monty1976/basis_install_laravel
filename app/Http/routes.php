<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

//pages
Route::get('policies', 'PageController@policy');
Route::get('about', 'PageController@about');

//parents
Route::get('parent', 'ParentController@index');

//child
//Route::get('child/{id}', 'ChildController@index');
Route::get('child/{id}', 'ChildController@show');

//form
Route::post('form', 'FormController@registerForm');

//auth
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('activity', 'ActivityController@createActivity');
Route::post('activity', 'ActivityController@registerActivity');
