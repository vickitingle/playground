<?php

namespace Playground\installers;
require_once('../../config.php');

$tableName = 'ultimates';
$columns = 'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            voice_line VARCHAR(255) NOT NULL,
            hero_id int NOT NULL';

$sql = 'CREATE TABLE ' . $tableName . ' (' . $columns . ')';

$mysqli = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$result = $mysqli->query($sql);

if ($result) {
    echo 'Successfully installed table ' . $tableName;
    exit;
}

echo 'Failed to install table ' . $tableName . '. Check SQL syntax.';
