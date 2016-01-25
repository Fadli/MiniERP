<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
	Route::resource('/user', 'UserController');
	Route::resource('/product', 'ProductController');

	Route::get('/permission', 'PermissionController@index');

	//module user.role
	Route::get('/role', 'RoleController@index');
	Route::get('/role/addrole', 'RoleController@create');
	Route::post('role', ['as' => 'addrole', 'uses' => 'RoleController@store']);
	Route::delete('role/{id}', ['as' => 'deleterole', 'uses' => 'RoleController@destroy']);

});
