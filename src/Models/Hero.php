<?php

namespace Playground\Models;

use Core\AbstractModel;
use Core\Database;
use Core\Core;

class Hero extends AbstractModel
{
    protected $core;
    protected $data;
    protected $database;

    public function __construct(
        Database $database,
        Core $core
    ) {
        $this->core = $core;
        $this->database = $database;
        parent::__construct($database, $core);
        $this->table = 'heroes';
        $this->primaryKey = 'id';
    }

    public function getAllHeroes()
    {
        return $this->getCollection('hero');
    }

    public function getHeroById($id)
    {
        $this->data = $this->getById($id);
        return $this->getRepository('hero');
    }
}