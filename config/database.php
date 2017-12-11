<?php

return [
    'default' => env('DB_CONNECTION', 'sqlsrv'),

    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '122.117.135.215'),
            'port' => env('DB_PORT', '63232'),
            'database' => env('DB_DATABASE', 'power'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', '59209167'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        'mysql_location' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'power'),
            'username' => env('DB_USERNAME', 'sa'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'power'),
            'username' => env('DB_USERNAME', 'abc'),
            'password' => env('DB_PASSWORD', 'root'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', '122.117.135.215,63221'),
            'port' => env('DB_PORT', '63221'),
            'database' => env('DB_DATABASE', 'power_test'),
            'username' => env('DB_USERNAME', 'icpsi'),
            'password' => env('DB_PASSWORD', '633221'),
            'charset' => 'utf8',
            'prefix' => '',
        ],

    ],
    /*
    'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', '122.117.135.215,63221'),
            'port' => env('DB_PORT', '63221'),
            'database' => env('DB_DATABASE', 'power_test'),
            'username' => env('DB_USERNAME', 'icpsi'),
            'password' => env('DB_PASSWORD', '59209167'),
            'charset' => 'utf8',
            'prefix' => '',
        ],
    'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'power'),
            'username' => env('DB_USERNAME', 'abc'),
            'password' => env('DB_PASSWORD', 'root'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]
    */
    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
