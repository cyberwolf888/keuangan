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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'bendahara', 'middleware' => ['can:bendahara,App\User'], 'as'=>'bendahara'], function() {

    //dashboard
    Route::get('/', 'Bendahara\DashboardController@index')->name('.dashboard');

    //dana
    Route::group(['prefix' => 'dana', 'middleware' => ['can:bendahara,App\User'], 'as'=>'.dana'], function() {
        Route::get('/', 'Bendahara\DanaController@index')->name('.manage');
        Route::get('/create', 'Bendahara\DanaController@create')->name('.create');
        Route::post('/store', 'Bendahara\DanaController@store')->name('.store');
        Route::get('/edit/{id}', 'Bendahara\DanaController@edit')->name('.edit');
        Route::post('/update/{id}', 'Bendahara\DanaController@update')->name('.update');
        Route::get('/detail/{id}', 'Bendahara\DanaController@show')->name('.detail');
        Route::get('/delete/{id}', 'Bendahara\DanaController@destroy')->name('.delete');
    });

    //user
    Route::group(['prefix' => 'user', 'middleware' => ['can:bendahara,App\User'], 'as'=>'.user'], function() {

        //bendahara
        Route::group(['prefix' => 'bendahara', 'middleware' => ['can:bendahara,App\User'], 'as'=>'.bendahara'], function() {
            Route::get('/', 'Bendahara\UserController@bendahara')->name('.manage');
            Route::get('/create', 'Bendahara\UserController@create_bendahara')->name('.create');
            Route::post('/store', 'Bendahara\UserController@store_bendahara')->name('.store');
            Route::get('/edit/{id}', 'Bendahara\UserController@edit_bendahara')->name('.edit');
            Route::post('/update/{id}', 'Bendahara\UserController@update_bendahara')->name('.update');
        });

        //kabag
        Route::group(['prefix' => 'kabag', 'middleware' => ['can:bendahara,App\User'], 'as'=>'.kabag'], function() {
            Route::get('/', 'Bendahara\UserController@kabag')->name('.manage');
            Route::get('/create', 'Bendahara\UserController@create_kabag')->name('.create');
            Route::post('/store', 'Bendahara\UserController@store_kabag')->name('.store');
            Route::get('/edit/{id}', 'Bendahara\UserController@edit_kabag')->name('.edit');
            Route::post('/update/{id}', 'Bendahara\UserController@update_kabag')->name('.update');
        });
    });

    //laporan
    Route::group(['prefix' => 'laporan', 'middleware' => ['can:bendahara,App\User'], 'as'=>'.laporan'], function() {
        Route::get('/', 'Bendahara\LaporanController@period')->name('.period');
        Route::post('/result', 'Bendahara\LaporanController@result')->name('.result');
    });

});

Route::group(['prefix' => 'kabag', 'middleware' => ['can:kabag,App\User'], 'as'=>'kabag'], function() {

    //dashboard
    Route::get('/', 'Kabag\DashboardController@index')->name('.dashboard');

    //laporan
    Route::group(['prefix' => 'laporan', 'middleware' => ['can:kabag,App\User'], 'as'=>'.laporan'], function() {
        Route::get('/', 'Kabag\LaporanController@period')->name('.period');
        Route::post('/result', 'Kabag\LaporanController@result')->name('.result');
    });

});