<?php
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin::'], function () {
    Route::get('login', ['uses' => 'AuthController@showLoginForm', 'as' => 'showLoginForm']);
    Route::post('login', ['uses' => 'AuthController@postLogin', 'as' => 'postLogin']);
    Route::get('logout', ['uses' => 'AuthController@logout', 'as' => 'logout']);
    Route::get('setPassword/{token}',
        ['uses' => 'PasswordController@showPasswordResetForm', 'as' => 'setPassword']);
    Route::post('password/reset/{userId}',
        ['uses' => 'PasswordController@postPasswordReset', 'as' => 'passwordReset']);


    Route::group(['middleware' => ['auth:admin']], function () {
        // Make adverts list as index url for admin
        Route::get('/', ['uses' => 'RaportsController@index'])->name('index');

        //Roles routes
        Route::group(['prefix' => 'roles', 'as' => 'role.'], function () {
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


        $routes = [
            ['controller' => 'StandsController', 'prefix' => 'stands', 'accesPrefix' => 'stand.'],
            ['controller' => 'AircraftsController', 'prefix' => 'aircrafts', 'accesPrefix' => 'aircraft.'],
            ['controller' => 'StatusesController', 'prefix' => 'statuses', 'accesPrefix' => 'status.'],
            ['controller' => 'RaportsController', 'prefix' => 'raports', 'accesPrefix' => 'raport.'],
        ];

        foreach ($routes as $oneRoute) {
            Route::group(['prefix' => $oneRoute['prefix'], 'as' => $oneRoute['accesPrefix']],
                function () use ($oneRoute) {
                    Route::get('/', [
                        'uses' => $oneRoute['controller'] . '@index',
                        'as' => 'index',
                        'permissions' => [$oneRoute['accesPrefix'] . 'view']
                    ]);

                    Route::get('/create',
                        [
                            'uses' => $oneRoute['controller'] . '@create',
                            'as' => 'create',
                            'permissions' => [$oneRoute['accesPrefix'] . 'create']
                        ]
                    );
                    Route::get('/{id?}',
                        [
                            'uses' => $oneRoute['controller'] . '@show',
                            'as' => 'show',
                            'permissions' => [$oneRoute['accesPrefix'] . 'show']
                        ]
                    );
                    Route::post('/',
                        [
                            'uses' => $oneRoute['controller'] . '@store',
                            'as' => 'create',
                            'permissions' => [$oneRoute['accesPrefix'] . 'create']
                        ]
                    );
                    Route::get('{id?}/edit/',
                        [
                            'uses' => $oneRoute['controller'] . '@edit',
                            'as' => 'edit',
                            'permissions' => [$oneRoute['accesPrefix'] . 'edit']
                        ]
                    );
                    Route::put('/{id?}',
                        [
                            'uses' => $oneRoute['controller'] . '@update',
                            'as' => 'edit',
                            'permissions' => [$oneRoute['accesPrefix'] . 'edit']
                        ]
                    );

                    Route::delete('/{id?}', [
                        'uses' => $oneRoute['controller'] . '@destroy',
                        'as' => 'delete',
                        'permissions' => [$oneRoute['accesPrefix'] . 'delete']

                    ]);
                });
        }

        //User routes
        Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
            Route::get('/', ['uses' => 'UsersController@index', 'as' => 'index', 'permissions' => ['user.view']]);
            Route::get('/form/{userId?}',
                ['uses' => 'UsersController@showForm', 'as' => 'showForm', 'permissions' => ['user.edit']]
            );
            Route::post('/{userId?}',
                ['uses' => 'UsersController@postUser', 'as' => 'post', 'permissions' => ['user.edit']]
            );
            Route::get('/password-reset/{userId?}',
                [
                    'uses' => 'UsersController@resetPassword',
                    'as' => 'resetPassword',
                    'permissions' => ['user.passwordReset']
                ]
            );
            Route::get('/delete/{userId}',
                ['uses' => 'UsersController@deleteUser', 'as' => 'delete', 'permissions' => ['user.delete']]
            );
        });


    });


});