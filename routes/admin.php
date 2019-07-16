<?php
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin::'], function (){
    Route::get('login', ['uses' => 'AuthController@showLoginForm', 'as' => 'showLoginForm']);
    Route::post('login', ['uses' => 'AuthController@postLogin', 'as' => 'postLogin']);
    Route::get('logout', ['uses' => 'AuthController@logout', 'as' => 'logout']);

    Route::group(['middleware' => ['auth:admin']], function() {
        // Make adverts list as index url for admin
        Route::get('/', function(){
            return view('admin.reports.index');
        })->name('index');
    });
});