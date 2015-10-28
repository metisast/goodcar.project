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

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
|
| Группа роутов для гостей сайта
|
*/

/* Main page */
Route::get('/', function () {
    return view('guest.index');
});

Route::group(['namespace' => 'Guest'], function()
{
    /*-- Товары по категориям --*/
    Route::get('/catalogs/{id}', [
        'as' => 'guest.catalogs.show',
        'uses' => 'CatalogsController@show'
    ]);

    /*-- Просмотр товара --*/
    Route::get('/products/{id}', [
        'as' => 'guest.products.show',
        'uses' => 'ProductsController@show'
    ]);
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

    /*-- Роуты продуктов --*/
    Route::get('admin/products/delete/{id}',[
        'as' => 'admin.products.delete',
        'uses' => 'ProductsController@delete'
    ]);

    Route::post('admin/products/images/{id}',[
        'as' => 'admin.products.createImages',
        'uses' => 'ProductsController@createImages'
    ]);
    Route::get('admin/products/images/{id}/{image}',[
        'as' => 'admin.products.mainImage',
        'uses' => 'ProductsController@mainImage'
    ]);
    Route::post('admin/products/deleteImages/{id}',[
        'as' => 'admin.products.deleteImages',
        'uses' => 'ProductsController@deleteImages'
    ]);

    Route::resource('admin/products', 'ProductsController');

    /*-- Роуты для характеристик --*/
    Route::resource('admin/features', 'FeaturesController');


    /*-- Роуты каталогов --*/
    Route::get('admin/catalogs/delete/{id}',[
        'as' => 'admin.catalogs.delete',
        'uses' => 'CatalogsController@delete'
    ]);
    Route::resource('admin/catalogs', 'CatalogsController');
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
