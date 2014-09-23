<?php

return [
    'default' => 'main',

    'connections' => [
        'main' => [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => ''
        ]
    ]
];
