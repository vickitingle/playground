<?php

namespace Playground\Models;

use Core\AbstractModel;
use Core\Database;
use Core\Core;

class Ultimate extends AbstractModel
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
        $this->table = 'ultimates';
        $this->primaryKey = 'id';
    }

    /**
     * @return array
     */
    public function getAllUltimates()
    {
        return $this->getCollection('ultimate');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUltimateById($id)
    {
        $this->data = $this->getById($id);
        return $this->getRepository('ultimate');
    }

    /**
     * @param $heroId
     * @return mixed
     */
    public function getHeroUltimate($heroId)
    {
        $this->data = $this->getItem('hero_id', $heroId);
        return $this->getRepository('ultimate');
    }
}