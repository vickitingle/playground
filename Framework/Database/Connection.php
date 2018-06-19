<?php

namespace Framework\Database;

use PDO;
use PDOException;

class Connection
{
    protected $db;
    public function __construct()
    {
        $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
        try {
            $this->db = new PDO($dsn, DB_USER, DB_PASS);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }
}