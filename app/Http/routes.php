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

//pages
Route::get('home', 'HomeController@index');
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

//form -> when a form is being registered a mail to the institution is sent as well
Route::post('form', 'FormController@registerForm');

//employees
Route::get('employee', [
    'as' => 'employee',
    'uses' =>'EmployeeController@index'
]);

Route::get('employee/post',  [
    'as' => 'employee_post',
    'uses' => 'EmployeeController@post'
]);

Route::get('employee/sleep', [
    'as' => 'employee_sleep',
    'uses' => 'EmployeeController@sleep'
]);

Route::get('employee/activity', [
    'as' => 'activity',
    'uses' => 'EmployeeController@activity'
]);

Route::get('employee/parent', [
   'as' => 'employee_parent',
    'uses' => 'EmployeeController@showCreateParent'
]);

Route::post('employee_parent', 'EmployeeController@doCreateParent');

//child
Route::get('child/{id}', 'ChildController@show');

Route::get('create_child', [
 'as' => 'create_child',
    'uses' => 'EmployeeController@showCreateChild'
]);

Route::post('create_child','EmployeeController@doCreateChild');

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
Route::get('employee/activity', [
    'as' => 'activity',
    'uses' => 'ActivityController@showNurseryByUser'
]);
Route::post('activity', 'ActivityController@registerActivity');

Route::get('passwordfunction', 'HomeController@passwordfunction');


//Nursery

Route::get('nursery/create_type', [
    'as' => 'nursery_create_type',
    'uses' => 'NurseryController@showCreateNurseryType'
]);
Route::post('nursery/create_type', 'NurseryController@doCreateNurseryType');

Route::get('nursery/create', [
    'as' => 'nursery_create',
    'uses' => 'NurseryController@showCreateNursery'
]);
Route::post('nursery/create', 'NurseryController@doCreateNursery');





//mail
//Route::get('mail','MailController@index');
//Route::get('mail', 'MailController@sendIllness');


//pages
Route::get('pages', 'CMS\PagesController@index');
Route::get('create_page', 'CMS\PagesController@showCreate');
Route::post('create_page', 'CMS\PagesController@doCreate');

//sections
Route::get('create_section/{pageId}',[
    'as' => 'create_section',
    'uses' =>  'CMS\SectionsController@showCreate'
]);
Route::post('create_section', 'CMS\SectionsController@doCreate');


//columns
Route::get('create_column/{sectionId}', [
    'as' => 'create_column',
    'uses' => 'CMS\ColumnsController@showCreate'
]);
Route::post('create_column', 'CMS\ColumnsController@doCreate');

//Content
Route::get('show_pages', [
    'as' => 'show_pages',
    'uses' =>  'CMS\ContentController@showPages'
]);

Route::get('show_page/{pageId}',[
    'as' => 'show_page',
    'uses' => 'CMS\ContentController@showPage'
]);

Route::get('create_content/{columnId}/{pageId}', [
    'as' => 'create_content',
    'uses' => 'CMS\ContentController@showCreate'
]);

Route::post('create_text_content', 'CMS\ContentController@doTextContent');
Route::post('create_image_content', 'CMS\ContentController@doImageContent');

Route::get('navigation', [
    'as' => 'navigation',
    'uses' => 'CMS\ContentController@showContentPages'
]);


Route::get('showContent/{pageId}', [
    'as' => 'showContent',
    'uses' => 'CMS\ContentController@showContent'
]);

//image upload
Route::get('upload_image', 'CMS\ContentController@imageUploadShow');
Route::post('upload_image', 'CMS\ContentController@imageUploadDo');


//Delete page

Route::get('deletePage/{pageId}',[
    'as' => 'deletePage',
    'uses' => 'CMS\ContentController@deletePage'
]);

//Delete section

Route::get('delete_section/{sectionId}',[
    'as' => 'delete_section',
    'uses' => 'CMS\SectionsController@deleteSection'
]);

//Delete Column
Route::get('delete_column/{columnId}',[
    'as' => 'delete_column',
    'uses' => 'CMS\ColumnsController@deleteColumn'
]);

//subpages
Route::get('create_subpage', 'CMS\PagesController@showCreateSubPage');
Route::post('create_subpage', 'CMS\PagesController@doCreateSubpage');