# Frankie Logger Module

Add Monolog to your project

```php
[
    ...,
    new LoggerModule([
        'name' => 'default',
        'handlers' => [
            StreamHandler::class => [
                'path' => '/tmp/test.log',
                'level' => Logger::DEBUG,
            ],
        ],
    ]),
]
```

