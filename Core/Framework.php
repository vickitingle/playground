<?php

namespace Core;

class Framework
{
    //@todo move these into config.php as globals
    const DEFAULT_CONTROLLER = '\\IndexController';
    const DEFAULT_CONTROLLER_PREFIX = 'Playground\Controllers';
    const DEFAULT_ACTION = 'index';
    protected $requestUri;
    protected $controllerClass;

    public function __construct($requestUri)
    {
        $this->requestUri = $requestUri;
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        $requestString = explode('/', $this->requestUri);
        $this->controllerClass = isset($requestString[1]) && $requestString[1] !== ''
          ? self::DEFAULT_CONTROLLER_PREFIX . '\\' . ucfirst($requestString[1]) . 'Controller'
          : self::DEFAULT_CONTROLLER_PREFIX . self::DEFAULT_CONTROLLER;
        $action = isset($requestString[2]) && $requestString[2] !== '' ? $requestString[2] : self::DEFAULT_ACTION;
        try {
            $controller = new $this->controllerClass();
            $controller->$action();
        } catch (\Exception $e) {
            throw new \Exception('There was an issue loading the page: ' . $e->getMessage());
        }
    }
}