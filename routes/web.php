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
    return view('home.index');
});

Route::get('/auth', function () {
    return view('auth.index');
});

Route::get('/admin/stands', function () {
    return view('admin.stands');
});

Route::get('/admin/aircrafts', function () {
    return view('admin.aircrafts');
});

Route::get('/admin/reports', function () {
    return view('admin.reports');
});

