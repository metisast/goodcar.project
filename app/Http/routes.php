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

/* Main page */
Route::get('/', function () {
    return view('user.index');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| Независимые роуты для авторизации
|
*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Группа роутов для админ-панели
|
*/

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function()
{
    Route::get('admin', [
        'as' => 'admin.index',
        'uses' => 'AdminController@index'
    ]);
    Route::get('admin/buy', [
        'as' => 'admin.buy',
        'uses' => 'BuyController@index'
    ]);
    Route::get('admin/products', [
        'as' => 'admin.products',
        'uses' => 'ProductsController@index'
    ]);
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Группа роутов для зарегистрированных пользователей
|
*/

Route::group(['middleware' => 'user', 'namespace' => 'User'], function()
{
    Route::get('user', [
        'as' => 'user.index',
        'uses' => 'UserController@index'
    ]);
});
