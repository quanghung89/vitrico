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
Route::get('auth/login',['as'=>'login', 'uses'=>'Auth\LoginController@getLogin']);
Route::post('auth/login',['as'=>'auth.login', 'uses'=>'Auth\LoginController@postLogin']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\LoginController@logout']);

Route::group(['middleware' => 'checkLogin', 'prefix' => 'admin'], function() {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('index', ['as' => 'dashboard.index', 'uses' => 'Backend\DashboardController@index']);
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('index', ['as' => 'category.index', 'uses' => 'Backend\CategoryController@index']);

        Route::get('create', ['as' => 'category.create', 'uses' => 'Backend\CategoryController@create']);
        Route::post('create', ['as' => 'category.store', 'uses' => 'Backend\CategoryController@store']);

        Route::get('edit/{id}', ['as' => 'category.edit', 'uses' => 'Backend\CategoryController@edit']);
        Route::post('update/{id}', ['as' => 'category.update', 'uses' => 'Backend\CategoryController@update']);

        Route::get('delete/{id}', ['as' => 'category.destroy', 'uses' => 'Backend\CategoryController@destroy']);
    });

    Route::group(['prefix' => 'new'], function () {
        Route::get('index', ['as' => 'news.index', 'uses' => 'Backend\NewController@index']);

        Route::get('create', ['as' => 'news.create', 'uses' => 'Backend\NewController@create']);
        Route::post('create', ['as' => 'news.store', 'uses' => 'Backend\NewController@store']);

        Route::get('edit/{id}', ['as' => 'news.edit', 'uses' => 'Backend\NewController@edit']);
        Route::post('update/{id}', ['as' => 'news.update', 'uses' => 'Backend\NewController@update']);

        Route::get('delete/{id}', ['as' => 'news.destroy', 'uses' => 'Backend\NewController@destroy']);
    });

    Route::group(['prefix' => 'university'], function () {
        Route::get('index', ['as' => 'university.index', 'uses' => 'Backend\UniversityController@index']);

        Route::get('create', ['as' => 'university.create', 'uses' => 'Backend\UniversityController@create']);
        Route::post('create', ['as' => 'university.store', 'uses' => 'Backend\UniversityController@store']);

        Route::get('edit/{id}', ['as' => 'university.edit', 'uses' => 'Backend\UniversityController@edit']);
        Route::post('update/{id}', ['as' => 'university.update', 'uses' => 'Backend\UniversityController@update']);

        Route::get('delete/{id}', ['as' => 'university.destroy', 'uses' => 'Backend\UniversityController@destroy']);
    });

    Route::group(['prefix' => 'account'], function () {
        Route::get('index', ['as' => 'account.index', 'uses' => 'Backend\AccountController@index']);

        Route::get('create', ['as' => 'account.create', 'uses' => 'Backend\AccountController@create']);
        Route::post('create', ['as' => 'account.store', 'uses' => 'Backend\AccountController@store']);

        Route::get('edit/{id}', ['as' => 'account.edit', 'uses' => 'Backend\AccountController@edit']);
        Route::post('update/{id}', ['as' => 'account.update', 'uses' => 'Backend\AccountController@update']);

        Route::get('delete/{id}', ['as' => 'account.destroy', 'uses' => 'Backend\AccountController@destroy']);
    });

    Route::group(['prefix' => 'slide'], function () {
        Route::get('index', ['as' => 'slide.index', 'uses' => 'Backend\SlideController@index']);

        Route::get('create', ['as' => 'slide.create', 'uses' => 'Backend\SlideController@create']);
        Route::post('create', ['as' => 'slide.store', 'uses' => 'Backend\SlideController@store']);

        Route::get('edit/{id}', ['as' => 'slide.edit', 'uses' => 'Backend\SlideController@edit']);
        Route::post('update/{id}', ['as' => 'slide.update', 'uses' => 'Backend\SlideController@update']);

        Route::get('delete/{id}', ['as' => 'slide.destroy', 'uses' => 'Backend\SlideController@destroy']);
    });
});

Route::get('/', ['as'=>'index', 'uses' => 'Frontend\FrontendController@index']);
Route::get('/tin-tuc/{id}/{slug}.html', ['as'=>'tin-tuc', 'uses' => 'Frontend\FrontendController@tintuc']);
Route::get('/tin-tuc', ['as'=>'all-news', 'uses' => 'Frontend\FrontendController@allnews']);
Route::get('/detail-university/{id}/{slug}.html', ['as'=>'detail-university', 'uses' => 'Frontend\FrontendController@detailuniversity']);
Route::get('/all-university', ['as'=>'all-university', 'uses' => 'Frontend\FrontendController@alluniversity']);

