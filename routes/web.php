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
    return redirect('admin');
//    return view('admin.index');
});

Route::get('/auth', function () {
    return view('auth.index');
});

/*Route::post('api/beacon', 'api\BeaconController@store')->name('beacon.store');
Route::get('api/beacon', 'api\BeaconController@index')->name('beacon');*/
