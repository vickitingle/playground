<?php

namespace Playground\Controllers;

use Core\AbstractController;
use Core\Core;
use Playground\Models\Hero;
use Playground\Models\Repositories\Hero\HeroRepository;

class IndexController extends AbstractController
{
    /** @var Hero  */
    protected $hero;

    /**
     * IndexController constructor.
     * @param Core $core
     * @throws \ReflectionException
     */
    public function __construct(
        Core $core
    ) {
        parent::__construct($core);
        $this->hero = $this->loadModel('Hero');
    }

    /**
    * @return string
    * @throws \Exception
    */
    public function index()
    {
        /** @var HeroRepository $hero */
        $heroes = $this->hero->getCollection('hero');
        return $this->loadView('home/index', [
            'name' => 'Vicki',
            'heroes' => $heroes
        ]);
    }

    public function view()
    {
        echo 'heres the view action of the index controller';
    }
}