<?php
namespace Corley\LoggerModule\Factory;

use PHPUnit\Framework\TestCase;
use Corley\LoggerModule\LoggerModule;
use Psr\Container\ContainerInterface;
use Monolog\Logger;

class LoggerFactoryTest extends TestCase
{
    public function testCreate()
    {
        $module = new LoggerModule([
            'name' => 'default',
            'handlers' => [],
        ]);

        $container = $module->getContainer();

        $this->assertInstanceOf(ContainerInterface::class, $container);
        $this->assertTrue($container->has("logger"));
        $this->assertInstanceOf(Logger::class, $container->get("logger"));
    }
}
