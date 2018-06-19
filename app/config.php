<?php
define('APP_NAME', 'Simple MVC');
define('APP_DOMAIN', 'playground.rufio.office.cogapp.com');
define('APP_INNER_DIRECTORY', '/mix/mvc');
define('APP_ROOT', realpath(dirname(__FILE__) . '/..'));

define('APP_CONTROLLER_NAMESPACE', 'Controller\\');
define('APP_DEFAULT_CONTROLLER', 'Home');
define('APP_DEFAULT_CONTROLLER_METHOD', 'index');
define('APP_CONTROLLER_METHOD_SUFFIX', 'Action');

define('DB_HOST', 'localhost');
define('DB_NAME', 'playground');
define('DB_USER', 'root');
define('DB_PASS', 'root');