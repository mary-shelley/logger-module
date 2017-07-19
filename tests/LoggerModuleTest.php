<?php
namespace Corley\LoggerModule;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggerModuleTest extends TestCase
{
    public function testCreateBaseLoggerService()
    {
        $module = new LoggerModule([
            'name' => 'default',
            'handlers' => [
                StreamHandler::class => [
                    'path'   => '/tmp/test.log',
                    'level'  => Logger::DEBUG,
                ],
            ],
        ]);
        $container = $module->getContainer();
        $this->assertInstanceOf(ContainerInterface::class, $container);
        $this->assertTrue($container->has('logger'));

        $logger = $container->get('logger');

        $this->assertInstanceOf(Logger::class, $logger);
    }
}
