<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Served Name
    |--------------------------------------------------------------------------
    |
    | This value will be used in naming your docker containers.
    | It is best to make sure that this value is unique for each project.
    |
    */
    'name' => env('laravel_served_blog'),

    /**
     * If you are behind a proxy, you might need to
     * specify this to enable docker to gain access
     * to the internet while building your images
     */
    'proxy' => [
        'http' => env('SERVED_HTTP_PROXY', ''),
        'https' => env('SERVED_HTTPS_PROXY', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | PHP Server
    |--------------------------------------------------------------------------
    |
    | Here you can setup which php version you wish to run.
    | If no version is specified, latest will be used
    |
    | Under the modules array, you may add any php modules you wish to install.
    | A complete list of modules can be found at:
    | https://github.com/mlocati/docker-php-extension-installer#supported-php-extensions
    |
    */
    'php' => [
        'version' => env('SERVED_PHP_VERSION', '7.4'),
        'modules' => [
            'pdo_mysql',
            'zip',
            'bcmath'
        ],
        'npm' => true,
        'xdebug' => [
            'enabled' => true,
            'port' => 9001,
        ],
    ],
    'web' => [
        'service' => 'nginx', //or apache
        'version' => '1.9.2', //apache currently only supports latest!
        'port' => env('SERVED_WEB_PORT', 8095),
        'ssl_port' => env('SERVED_WEB_SSL_PORT', 4443),
    ],
    'extras' => [
        'mysql' => [
            'service' => 'mysql',
            'version' => '5.7',
            'port' => env('SERVED_EXTERNAL_DB_PORT', 33007),
            'root_password' => 'password',
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'laravel'),
            'password' => env('DB_PASSWORD', 'password'),
        ],
    ],
];
