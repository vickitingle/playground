<?php

namespace Core;

use Core\AbstractModel;
use Core\Core;

class Framework
{
    protected $core;
    protected $requestUri;
    protected $controllerClass;

    public function __construct(
        Core $core,
        $requestUri
    ) {
        $this->core = $core;
        $this->requestUri = $requestUri;
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        $requestString = explode('/', $this->requestUri);
        $this->controllerClass = isset($requestString[1]) && $requestString[1] !== ''
          ? DEFAULT_CONTROLLER_PREFIX . '\\' . ucfirst($requestString[1]) . 'Controller'
          : DEFAULT_CONTROLLER_PREFIX . DEFAULT_CONTROLLER;
        $action = isset($requestString[2]) && $requestString[2] !== '' ? $requestString[2] : DEFAULT_ACTION;
        try {
            $controller = $this->core->createClassInstance($this->controllerClass, 'controller');
            $controller->$action();
        } catch (\Exception $e) {
            throw new \Exception('There was an issue loading the page: ' . $e->getMessage());
        }
    }
}