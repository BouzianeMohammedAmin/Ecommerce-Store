<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// note that the prifix is admin of all file route 

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => 'auth:admin'], function () {
            Route::get('/', 'DashboardController@index')->name('admin.dashboard');
            Route::get('logout', 'LoginController@logout')->name('admin.logout');


            Route::group(['prefix' => 'setting'], function () {
                Route::get('shipping-methods/{type}', 'SettingsController@editShippingMethod')->name('edit.shippings.methods');
                Route::put('/shipping-methods/{id}', 'SettingsController@updateShippingMethod')->name('update.shippings.methods');
            });
        });


        Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => 'guest:admin'], function () {

            Route::get('login', 'LoginController@login')->name('admin.login');

            Route::post('login', 'LoginController@postLogin')->name('admin.post.login');
        });
    }
);