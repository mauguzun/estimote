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

        //Roles routes
        Route::group(['prefix' => 'roles', 'as' => 'role.'], function (){
            Route::get('/', ['uses' => 'RolesController@index', 'as' => 'index', 'permissions' => ['role.view']]);
            Route::get('/form/{roleId?}',
                ['uses' => 'RolesController@showForm', 'as' => 'showForm', 'permissions' => ['role.edit']]
            );
            Route::post('/{roleId?}',
                ['uses' => 'RolesController@postRole', 'as' => 'post', 'permissions' => ['role.edit']]
            );
            Route::get('/delete/{roleId}',
                ['uses' => 'RolesController@deleteRole', 'as' => 'delete', 'permissions' => ['role.delete']]
            );
            //Roles permissions
            Route::get('/permissions/{roleId}',
                [
                    'uses' => 'RolesController@editRolePermissions',
                    'as' => 'edit.permissions',
                    'permissions' => ['role.permission.edit']
                ]
            );
            Route::post('/{roleId}/permissions',
                [
                    'uses' => 'RolesController@postRolePermissions',
                    'as' => 'post.permissions',
                    'permissions' => ['role.permission.edit']
                ]
            );
        });
    });


});