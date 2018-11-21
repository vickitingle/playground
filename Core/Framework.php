<?php

namespace Core;

class Framework
{
    const DEFAULT_CONTROLLER = 'Playground\Controllers\IndexController';
    const DEFAULT_ACTION = 'index';
    protected $requestUri;
    protected $controllerClass;

    public function __construct($requestUri)
    {
        $this->requestUri = $requestUri;
    }

    public function run()
    {
        //$this->controllerClass = 'Playground\Controllers' . DS . ucfirst($requestString[1] . 'Controller');
        $requestString = explode('/', $this->requestUri);
        $this->controllerClass = isset($requestString[1]) && $requestString[1] !== '' ? $requestString[1] : self::DEFAULT_CONTROLLER;
        $action = isset($requestString[2]) && $requestString[2] !== '' ? $requestString[2] : self::DEFAULT_ACTION;
        $controller = new $this->controllerClass();
        $controller->$action();
    }
}