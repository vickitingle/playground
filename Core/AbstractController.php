<?php

namespace Core;

use Core\Template;
use Core\Core;

class AbstractController
{
    protected $core;
    public function __construct(
        Core $core
    ) {
        $this->core = $core;
    }

    /**
     * @param $path
     * @param $data
     * @return string
     * @throws \Exception
     */
    public function loadView($path, $data)
    {
        $template = new Template($path, $data);
        try {
            echo $template->render();
        } catch (\Exception $e) {
            throw new \Exception('The view could not be loaded: ' . $e->getMessage());
        }
    }

    /**
     * @param $model
     * @throws \ReflectionException
     * @return mixed
     */
    public function loadModel($model)
    {
        return $this->core->createClassInstance($model, 'model');
    }
}