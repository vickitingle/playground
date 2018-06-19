<?php

namespace Framework\Core;

use Exception;

class Template
{
    const DEFAULT_VIEW_PATH = '%s/public/views/default/';
    const ADMIN_VIEW_PATH = '%s/public/views/admin/';
    const BASE_VIEW = 'base.phtml';

    private $path;
    private $reservedVariables = ['application_name', 'body'];

    public function __construct()
    {
        $this->path = sprintf(self::DEFAULT_VIEW_PATH, APP_ROOT);
    }

    /**
     * Render a specific view
     * @param $controller
     * @param array $variables
     * @param bool $isAdmin
     * @return mixed
     */
    public function getView($controller, $isAdmin = false, array $variables = [])
    {
        if ($isAdmin) {
            $this->path = sprintf(self::ADMIN_VIEW_PATH, APP_ROOT);
        }
        $variables = $this->validateVariables($variables);

        $parts = explode('::', $controller);
        $directory = isset($parts[0]) ? $this->getDirectory($parts[0]) : false;
        $file = isset($parts[1]) ? $this->getFile($parts[1]) : false;

        if ($file && $directory) {
            $viewPath = $this->path . $file . '.phtml';
            if (file_exists($viewPath)) {
                $baseView = file_get_contents($this->path . '/' . self::BASE_VIEW);
                $body = file_get_contents($viewPath);
                $view = str_replace('{{ body }}', $body, $baseView);

                foreach ($variables as $key => $value) {
                    $view = str_replace('{{ '.$key.' }}', $value, $view);
                }
                return $view;
            }
        } else {
            http_response_code(404);
            echo 'View cannot be found.';
        }
    }

    /**
     * @param array $variables
     * @return array
     */
    public function validateVariables(array $variables = [])
    {
        foreach ($variables as $name => $value) {
            if (in_array($name, $this->reservedVariables)) {
                http_response_code(404);
                echo 'Unacceptable view variable given: [body]', 409;
            }
        }
        $variables['application_name'] = APP_NAME;
        return $variables;
    }

    /**
     * @param $controller
     * @return mixed
     */
    public function getDirectory($controller)
    {
        $parts = explode('\\', $controller);

        return end($parts);
    }

    /**
     * @param $controller
     * @return mixed
     */
    public function getFile($controller)
    {
        return str_replace(APP_CONTROLLER_METHOD_SUFFIX, null, $controller);
    }
}