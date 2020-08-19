<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin']], function (){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/role-register', 'Admin\DashboardController@registered');

    Route::get('/role-edit/{id}', 'Admin\DashboardController@registeredit');

    Route::put('/role-register-update/{id}', 'Admin\DashboardController@registerupdate');

    Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

    Route::get('/abouts', 'Admin\AboutusController@index');

    Route::post('/save-aboutus', 'Admin\AboutusController@store');

    Route::get('/about-us/{id}', 'Admin\AboutusController@edit');

    Route::put('/about-update/{id}', 'Admin\AboutusController@update');

    Route::delete('/about-us-delete/{id}', 'Admin\AboutusController@delete');

    Route::get('/service-category', 'Admin\ServiceController@index');

    Route::get('/services-create', 'Admin\ServiceController@create');

    Route::post('/category-store', 'Admin\ServiceController@store');

    Route::get('/service-cate-edit/{id}', 'Admin\ServiceController@edit');

    Route::put('/category-update/{id}', 'Admin\ServiceController@update');
    
    Route::delete('/service-category-delete/{id}', 'Admin\ServiceController@delete');

    Route::get('/service-list', 'Admin\ServicelistController@index');

    Route::post('/servicelist-add', 'Admin\ServicelistController@store');

    Route::get('/service-list-edit/{id}', 'Admin\ServicelistController@edit' );

    Route::put('/servicelist-update/{id}', 'Admin\ServicelistController@update');

    Route::delete('/servicelist-delete/{id}', 'Admin\ServicelistController@delete');
});

//DEFAULT
/* Route::get('/admin', function () {
    return view('admin.dashboard');
}); */




