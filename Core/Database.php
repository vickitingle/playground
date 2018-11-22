<?php

namespace Core;

class Database
{
    protected $db;

    public function __construct()
    {
        $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;

        try {
            $this->db = new \PDO($dsn, DB_USER, DB_PASS);
        } catch (\PDOException $e) {
            throw new \PDOException('Connection to database failed: ' . $e->getMessage());
        }
    }

    public function selectAll($table)
    {
        $sql = 'SELECT * FROM ' . $table;
        $query = $this->db->prepare($sql);
        $query->execute();
        try {
            $result = $query->fetchAll();
            return $result;
        } catch (\Exception $e) {
            throw new \PDOException('Unable to fetch from table: ' . $e->getMessage());
        }
    }

    public function select($table, $cols = [], $where)
    {
        $sql = 'SELECT ';
        foreach ($cols as $col) {
            $sql .= $col . ', ';
        }

        $sql = rtrim($sql, ', ');
        $sql .= ' FROM ' . $table . ' WHERE ';

        foreach ($where as $key => $value) {
            $sql .= $key . ' = "' . $value . '"';
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
}