<?php
require_once('../config.php');
require SITE_ROOT . DS . "vendor/autoload.php";
use Core\Framework;
use Core\Core;

$request = $_SERVER['REQUEST_URI'];

$core = new Core();
$framework = new Framework($core, $request);
try {
    $framework->run();
} catch (\Exception $e) {
    throw new Exception('Error starting application: ' . $e->getMessage());
}
