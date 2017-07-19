<?php
namespace Corley\LoggerModule\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Monolog\Logger;

class LoggerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $options = $container->get("logger-config");

        $log = new Logger($options['name']);

        foreach ($options['handlers'] as $name => $options) {
            $refl = new \ReflectionClass($name);
            $handlerClass = $refl->newInstanceArgs($options);

            $log->pushHandler($handlerClass);
        }

        return $log;
    }
}
