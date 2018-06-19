<?php

require_once __DIR__.'/app/config.php';
require_once __DIR__.'/src/autoload.php';

use Framework\Core\Request;
use Framework\Core\Template;
use Framework\Database\Db;

$request = new Request($_SERVER, $_POST, $_GET, $_FILES);

try {
    $controller = $request->getController();
    $method = $request->getAction($controller);

    $controller = new $controller(new Template(), new Db());
    echo $controller->$method();
} catch (Exception $e) {
    echo sprintf(
        '<h3>%s</h3><h4>%s</h4><h5>%s:%s</h5>',
        $e->getCode(),
        $e->getMessage(),
        $e->getFile(),
        $e->getLine()
    );
}