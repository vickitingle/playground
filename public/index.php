<?php
require_once('../config.php');
require SITE_ROOT . DS . "vendor/autoload.php";
use Core\Framework;

$request = $_SERVER['REQUEST_URI'];

$framework = new Framework($request);

$framework->run();