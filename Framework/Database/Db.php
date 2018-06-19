<?php

namespace Framework\Database;

use Framework\Database\Connection;
use PDOException;
use PDO;

class Db extends Connection
{
    public function selectTable($table)
    {
        try {
            $query = $this->db->prepare('SELECT * FROM ' . $table);
            $query->execute();
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $e) {
            throw new PDOException('A problem occurred fetching this table: ' . $e->getMessage());
        }
    }

    public function select($table, $params = [])
    {
        if (empty($params)) {
            return $this->selectTable($table);
        }

        $sql = 'SELECT * FROM ' . $table . ' WHERE ';

        $finalParam = end($params);
        foreach ($params as $param) {
            $sql .= $param;
            if ($param != $finalParam) {
                $sql .= ' AND ';
            }
        }
        $query = $this->db->prepare($sql);
        $query->execute();
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}