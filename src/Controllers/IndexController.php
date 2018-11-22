<?php

namespace Playground\Controllers;

use Core\AbstractController;

class IndexController extends AbstractController
{
    /**
    * @return string
    * @throws \Exception
    */
    public function index()
    {
        return $this->loadView('home/index', []);
    }

    public function view()
    {
        echo 'heres the view action of the index controller';
    }
}