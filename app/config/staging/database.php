<?php

return array(
    'default' => 'main',
    'connections' => array(
        'main' => array(
            'driver' => 'mysql',
            'host' => $_ENV['DATABASE_HOST'],
            'database' => $_ENV['DATABASE_NAME'],
            'username' => $_ENV['DATABASE_USERNAME'],
            'password' => $_ENV['DATABASE_PASSWORD'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        )
    )
);
