<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'admin_users',
    ],


    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'admin_users',
        ],
    ],


    'providers' => [
        'admin_users' => [
            'driver' => 'eloquent',
            'model' => App\Models\AdminUser::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    'passwords' => [
        'admin_users' => [
            'provider' => 'admin_users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
