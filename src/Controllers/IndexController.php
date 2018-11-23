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
//        $hero = $this->hero->getHeroById(1);
        $heroes = $this->hero->getCollection('hero');
        foreach ($heroes as $hero) {
            echo $hero->getName() . '<br/>';
        }
        return $this->loadView('home/index', [
            'name' => 'Vicki'
        ]);
    }

    public function view()
    {
        echo 'heres the view action of the index controller';
    }
}