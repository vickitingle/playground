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
     * @param string $class
     * @return array
     */
    public function getCollection($class)
    {
        $result = $this->db->selectAll($this->table);
        $collection = [];
        foreach ($result as $item) {
            $this->data = $item;
            $collection[] = $this->getRepository($class);
        }

        return $collection;
    }

    /**
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        return $this->db->select($this->table, ['*'], [$this->primaryKey => $id])[0];
    }

    /**
     * @param $class
     * @return mixed
     */
    public function getRepository($class)
    {
        $className = 'Playground\Models\Repositories\\' . ucfirst($class) . '\\' . ucfirst($class) . 'Repository';
        return new $className($this->db, $this->core, $this->data);
    }

    /**
     * @param $field
     * @param $value
     * @return array
     */
    public function getItem($field, $value)
    {
        return $this->db->select($this->table, ['*'], [$field => $value])[0];
    }

    public function getData($key)
    {
        return $this->data[$key];
    }

    public function setData($key, $value)
    {
        return $this->data[$key] = $value;
    }
}