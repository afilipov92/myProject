<?php

define('DEFAULT_CONTROLLER', 'Roadsigns');//добавить название контроллера по дефолту

define('BASE_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

define('DB_HOST', 'localhost');
define('DB_NAME', 'gai2');
define('DB_USER', 'root');
define('DB_PASSWORD', '------');
define('DB_PREFIX', 'st_');

require_once(__DIR__ . '/base/autoloaders.php');