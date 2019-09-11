<?php

return [
    'settings' => [
        'db' => [
            'dbParams' => [
                'driver' => 'pdo_sqlite',
                'url' => 'sqlite:///' . __DIR__ . '/../var/app.db',
            ],
            'path' => __DIR__ . '/../src/Entity',
            'cacheProxies' => __DIR__ . '/../var/doctrine_proxies',
        ],
        'env' => 'development'
    ]
];
