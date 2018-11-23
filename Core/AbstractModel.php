<?php

namespace Core;

use Core\Database;

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

    /**
     * AbstractModel constructor.
     * @param \Core\Database $db
     */
    public function __construct(
        Database $db
    ) {
        $this->db = $db;
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
    public function getCollection()
    {
        return $this->db->selectAll($this->table);
    }

    /**
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        return $this->db->select($this->table, ['*'], [$this->primaryKey => $id]);
    }
}