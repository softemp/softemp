<?php

/**
 * Vetor com nome dos database.
 * Ao database vai ser adicionado um prefix do .env DB_PREFIX, EX: softemp_base
 */
$modules = [
    'core',
    'stockcontrol',
    'mkauth'=>[
        'db_host'=>'_MKAUTH',
        'db_database'=>'_MKAUTH',
        'db_username'=>'_MKAUTH',
        'db_password'=>'_MKAUTH',
        'strict' =>'_MKAUTH',
    ],
    'website',
    'testimonial',
    'blog',
    'provedor'
];

$connections = array();
foreach ($modules as $module => $value) {
    if(!is_array($value)) {$module = $value;};

    $connections["mysql_" . $module] = [
        'driver' => 'mysql',
        'host' => env('DB_HOST'.(is_array($value)?mb_strtoupper('_'.$module):''), '127.0.0.2'),
        'port' => env('DB_PORT'.(is_array($value)?mb_strtoupper('_'.$module):''), '3306'),
        'database' => (is_array($value)?env(mb_strtoupper('DB_DATABASE_'.$module)):env('DB_PREFIX', '') . "_" . $module),
        'username' => env('DB_USERNAME'.(is_array($value)?mb_strtoupper('_'.$module):''), 'forge'),
        'password' => env('DB_PASSWORD'.(is_array($value)?mb_strtoupper('_'.$module):''), ''),
        'unix_socket' => env('DB_SOCKET', ''),
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => (is_array($value)?env(mb_strtoupper('DB_STRICT_'.$module)):true),
        'engine' => null,
    ];
}
//dd($connections);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => $connections,
//    [
//
//        'sqlite' => [
//            'driver' => 'sqlite',
//            'database' => env('DB_DATABASE', database_path('database.sqlite')),
//            'prefix' => '',
//            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
//        ],
//
//        'mysql' => [
//            'driver' => 'mysql',
//            'host' => env('DB_HOST', '127.0.0.1'),
//            'port' => env('DB_PORT', '3306'),
//            'database' => env('DB_DATABASE', 'forge'),
//            'username' => env('DB_USERNAME', 'forge'),
//            'password' => env('DB_PASSWORD', ''),
//            'unix_socket' => env('DB_SOCKET', ''),
//            'charset' => 'utf8mb4',
//            'collation' => 'utf8mb4_unicode_ci',
//            'prefix' => '',
//            'prefix_indexes' => true,
//            'strict' => true,
//            'engine' => null,
//            'options' => extension_loaded('pdo_mysql') ? array_filter([
//                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
//            ]) : [],
//        ],
//
//        'pgsql' => [
//            'driver' => 'pgsql',
//            'host' => env('DB_HOST', '127.0.0.1'),
//            'port' => env('DB_PORT', '5432'),
//            'database' => env('DB_DATABASE', 'forge'),
//            'username' => env('DB_USERNAME', 'forge'),
//            'password' => env('DB_PASSWORD', ''),
//            'charset' => 'utf8',
//            'prefix' => '',
//            'prefix_indexes' => true,
//            'schema' => 'public',
//            'sslmode' => 'prefer',
//        ],
//
//        'sqlsrv' => [
//            'driver' => 'sqlsrv',
//            'host' => env('DB_HOST', 'localhost'),
//            'port' => env('DB_PORT', '1433'),
//            'database' => env('DB_DATABASE', 'forge'),
//            'username' => env('DB_USERNAME', 'forge'),
//            'password' => env('DB_PASSWORD', ''),
//            'charset' => 'utf8',
//            'prefix' => '',
//            'prefix_indexes' => true,
//        ],
//
//    ],

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
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'predis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'predis'),
        ],

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DB', 0),
        ],

        'cache' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_CACHE_DB', 1),
        ],

    ],

];
