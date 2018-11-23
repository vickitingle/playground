<?php

namespace Playground\Controllers;

use Core\AbstractController;
use Playground\Models\Sample;

class IndexController extends AbstractController
{
    /**
    * @return string
    * @throws \Exception
    */
    public function index()
    {
        /** @var Sample $sampleModel */
        $sampleModel = $this->loadModel('Sample');
        return $this->loadView('home/index', [
            'name' => 'Vicki'
        ]);
    }

    public function view()
    {
        echo 'heres the view action of the index controller';
    }
}