<?php

namespace Core;

use Core\Database;
use Core\Core;

/**
 * Class AbstractModel
 * @package Core
 * @author Vicki Tingle <vicki.tingle@gmail.com>
 */
class AbstractModel
{
    /** @var \Core\Database  */
    protected $db;

    /** @var string */
    protected $table;

    /** @var string */
    protected $primaryKey;

    /** @var \Core\Core  */
    protected $core;

    /** @var array */
    protected $data = [];

    /**
     * AbstractModel constructor.
     * @param \Core\Database $db
     * @param \Core\Core $core
     */
    public function __construct(
        Database $db,
        Core $core
    ) {
        $this->db = $db;
        $this->core = $core;
    }

    /**
     * @return \Core\Database
     */
    public function getDatabase()
    {
        return $this->db;
    }

    /**
     * @return array
     */
    public function getCollection($class)
    {
        $result = $this->db->selectAll($this->table);
        $collection = [];
        foreach ($result as $item) {

        }
    }

    /**
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        return $this->db->select($this->table, ['*'], [$this->primaryKey => $id]);
    }

    public function getRepository($class)
    {
        $className = 'Playground\Models\Repositories\\' . ucfirst($class) . '\\' . ucfirst($class) . 'Repository';
        return new $className($this->db, $this->core, $this->data);

    }
}