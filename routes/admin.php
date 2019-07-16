<?php
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin::'], function (){
    Route::get('/', function(){
        return view('admin.reports.index');
    })->name('index');

    Route::get('/report_form', function(){
        return view('admin.report_form');
    })->name('report_form');

    Route::get('/login_form', function(){
        return view('admin.login_form');
    })->name('login_form');
});