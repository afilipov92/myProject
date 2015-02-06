<?php

define('DEFAULT_CONTROLLER', 'Roadsigns');//добавить название контроллера по дефолту

define('BASE_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

define('DB_HOST', 'localhost');
define('DB_NAME', 'gai2');
define('DB_USER', 'root');
define('DB_PASSWORD', '---');

define('CHAR_SET', 'UTF-8');
define('SMTP_SEC', 'ssl');
define('MAIL_HOST', 'smtp.yandex.ru');
define('MAIL_PORT', 465);
define('MAIL_USERNAME', 'al.oz2015@yandex.ru');
define('MAIL_PASSWORD', '---');

define('ID_ADMIN', 1);
define('ID_MODERATOR', 2);
define('ID_USER', 3);

require_once(__DIR__ . '/base/autoloaders.php');
require_once('helpers/PHPMailer/PHPMailerAutoload.php');
