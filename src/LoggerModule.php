<?php
namespace Corley\LoggerModule;

use Corley\Modular\Module\ModuleInterface;
use Zend\ServiceManager\ServiceManager;

class LoggerModule implements ModuleInterface
{
    private $options;

    public function __construct(array $options = [])
    {
        $this->options = array_replace_recursive([
            'name' => 'default',
            'handlers' => [],
        ], $options);
    }

    public function getContainer()
    {
        $conf = include __DIR__ . '/../configs/services.php';

        $serviceManager = new ServiceManager();
        $serviceManager->configure($conf["services"]);
        $serviceManager->setService("logger-config", $this->options);

        return $serviceManager;
    }
}
