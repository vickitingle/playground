<?php

namespace Core;

use Core\Template;

class AbstractController
{
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
}