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

Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');

/*
|------------------------------------
| Authentication
|------------------------------------
*/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*
|------------------------
| Registration
|------------------------
*/
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/*
|------------------------
| Password Reset
|------------------------
*/

// // Password reset link request routes...
// Route::get('password/email', 'Auth\PasswordController@getEmail');
// Route::post('password/email', 'Auth\PasswordController@postEmail');

// // Password reset routes...
// Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
// Route::post('password/reset', 'Auth\PasswordController@postReset');

/*
|--------------------------
| Create Groups
|--------------------------
*/
Route::get('/create-group', 'PagesController@viewCreateGroup');
Route::post('/create-group', 'PagesController@createGroup');

/*
|----------------------------
| View Groups
|----------------------------
*/
Route::get('/view-groups', 'PagesController@viewGroups');

/*
|----------------------------
| Join a Group
|----------------------------
*/
Route::get('/join-group/{group_id}', 'PagesController@viewJoinGroup');
Route::post('/join-group/{group_id}', 'PagesController@joinGroup');

/*
|-----------------------------
| Group Pages
|-----------------------------
*/

Route::get('/group/{group_id}', 'PagesController@viewGroupHome');
//
Route::get('group/{group_id}/new-item', 'PagesController@viewGroupNewItem');
Route::post('group/{group_id}/new-item', 'PagesController@addNewItem');
//
Route::get('group/{group_id}/member-list/{member_id}', ['middleware' =>'viewMyList', 'uses' => 'PagesController@viewMemberList']);
//
Route:post('group/{group_id}/reserve', 'PagesController@reserveItem');