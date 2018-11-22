<?php

namespace Core;

use Core\Database;

class AbstractModel
{
    protected $db;

    protected $table;

    protected $primaryKey;

    public function __construct()
    {
        $this->db = $this->getDatabase();
    }

    public function getDatabase()
    {
        return new Database();
    }

    public function getCollection()
    {
        return $this->db->selectAll($this->table);
    }

    public function getByLastName($lastName)
    {
        return $this->db->select($this->table, ['*'],
            [
                'lastname' => $lastName
            ]
        );
    }
}