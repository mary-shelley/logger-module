<?php

use Monolog\Logger;
use Corley\LoggerModule\Factory\LoggerFactory;

return [
    'services' => [
        'factories' => [
            Logger::class => LoggerFactory::class
        ],
        'aliases' => [
            'logger' => Logger::class,
        ],
    ],
];
