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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', 'WelcomeController@index')->name('homepage');

        
        Auth::routes();
        
        Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author|contributor|')->group(function (){
            Route::get('/', 'ManageController@index')->name('manage');
            Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
            Route::resource('/users', 'UserController');
            Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
            Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
            Route::get('/slides/fetch ', 'SlideController@fetch')->name('slides.fetch');
            Route::resource('/slides', 'SlideController');
        
        });
        
        Route::get('/home', 'HomeController@index')->name('home');
        
    });
    