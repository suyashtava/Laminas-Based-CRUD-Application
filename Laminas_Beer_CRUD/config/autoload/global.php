<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
use Laminas\Db\Adapter;

/*return [
    'db' => [
        'driver' => 'mysqli',
        'dsn' => 'mysql:host=localhost;dbname=dblaminas',
        'username' => 'root',
        'password' => 'Buildabit2021Hackfest',
    ],
 ];

*/

return [
    /*'db' => [
        'driver' => ['Pdo'],
        'adapters' => [
            mysqlAdapter::class => [
                'driver' => 'Pdo',
                'dsn' => 'mysql:dbname=dblaminas;host=localhost;charset=utf8',
                'username' => 'root',
                'password' => 'Buildabit2021Hackfest',
                'port' => '3306',
            ],
        ],
    ],
    */

   /* 'db' => array(
            'driver'         => 'Pdo',
            'adapters' => array(
                'default_db' => array(
                    'driver'         => 'Pdo',
                    'dsn'      => 'mysql:dbname=dblaminas;host=localhost',
                    'username' => 'root',
                    'password' => 'Buildabit2021Hackfest',
                     'port' => '3306',
                ),
            ),
        ),
*/
];
