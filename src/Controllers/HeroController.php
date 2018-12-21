<?php

namespace Playground\Controllers;

use Core\AbstractController;
use Core\Core;
use Playground\Models\Hero;
use Playground\Models\Repositories\Hero\HeroRepository;

class HeroController extends AbstractController
{
    /** @var Hero */
    protected $hero;

    /**
     * IndexController constructor.
     * @param Core $core
     * @throws \ReflectionException
     */
    public function __construct(
        Core $core
    )
    {
        parent::__construct($core);
        $this->hero = $this->loadModel('Hero');
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function index()
    {
        $heroId = $this->getParam('id');
        if (!is_null($heroId)) {
            $hero = $this->hero->getHeroById($heroId);
            return $this->loadView('heroes/view', [
                'hero' => $hero
            ]);
        }
    }
}