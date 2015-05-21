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

Route::get('/', 'HomeController@index');

Route::get('logout','WelcomeController@logout');

Route::get('mail','MailController@index');

Route::get('home', 'HomeController@index');

//pages
Route::get('policies', 'PageController@policy');
Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');

//parents
Route::get('parent', [
    'as' => 'parent', 
    'uses' => 'ParentController@index'
]);

Route::get('parent/profile', [
    'as' => 'parent_profile', 
    'uses' => 'ParentController@profile'
]);

Route::post('parent/profile', 'ParentController@editProfile');

//employees
Route::get('employee', [
    'as' => 'employee',
    'uses' =>'EmployeeController@index'
]);

Route::get('employee/post', 'EmployeeController@post');

Route::get('employee/sleep', 'EmployeeController@sleep');

Route::get('employee/activity', [
    'as' => 'activity',
    'uses' => 'EmployeeController@activity'
]);

//child
Route::get('child/{id}', 'ChildController@show');


//form
Route::post('form', 'FormController@registerForm');

//post
Route::post('post', 'PostController@registerPost');

//sleep
Route::get('employee/sleep', 'SleepController@showChildrenNames');
Route::post('sleep', 'SleepController@registerSleep');

//auth
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//activity
Route::get('activity', 'ActivityController@createActivity');
Route::post('activity', 'ActivityController@registerActivity');

Route::get('passwordfunction', 'HomeController@passwordfunction');
