<?php

define('SITE_ROOT', __DIR__);
define('DS', '/');
define('PUBLIC_ROOT', SITE_ROOT . DS . 'public');
define('SITE_URL', 'http://playground.rufio.office.cogapp.com');

define('TEMPLATE_PATH', PUBLIC_ROOT . DS . 'views');
define('CSS_PATH', 'assets' . DS . 'css');

define('DEFAULT_CONTROLLER', '\\IndexController');
define('DEFAULT_CONTROLLER_PREFIX', 'Playground\Controllers');
define('DEFAULT_ACTION', 'index');

define('DEFAULT_MODEL_PREFIX', 'Playground\Models');
define('DEFAULT_REPOSITORY_PREFIX', 'Playground\Models\Repositories');

define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'playground');