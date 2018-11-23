<?php
require_once('../config.php');
require SITE_ROOT . DS . "vendor/autoload.php";
use Core\Framework;
use Core\Core;

$request = $_SERVER['REQUEST_URI'];

$core = new Core();
$framework = new Framework($core, $request);

$framework->run();