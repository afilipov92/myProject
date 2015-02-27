<?php

define('DEFAULT_CONTROLLER', 'Roadsigns');

define('BASE_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('IMAGE_PATH', str_replace('inc', '', BASE_PATH) . 'images' . DIRECTORY_SEPARATOR . 'road_signs' . DIRECTORY_SEPARATOR);


define('DB_HOST', 'localhost');
define('DB_NAME', 'gai2');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

/*
define('DB_HOST', 'ares.beget.ru');
define('DB_NAME', 'zcfddd_liskorzun');
define('DB_USER', 'zcfddd_liskorzun');
define('DB_PASSWORD', 'liskorzun123');
*/
define('CHAR_SET', 'UTF-8');
define('SMTP_SEC', 'ssl');
define('MAIL_HOST', 'smtp.yandex.ru');
define('MAIL_PORT', 465);
define('MAIL_USERNAME', 'al.oz2015@yandex.ru');
define('MAIL_PASSWORD', '----');
define('MESSAGE_MAIL', 'Уважаемый %1$s,<br/>
            Спасибо за то, что Вы  создали аккаунт у нас. Для того чтобы активировать Ваш профиль нажмите на ссылку ниже:<br/>
            <a href="http://%2$s/registration/activation/%1$s/%3$s" target="_blank">
            %2$s/registration</a>');
define('THEME_MAIL', 'Регистрация на Alex-project');


define('ID_ADMIN', 1);
define('ID_MODERATOR', 2);
define('ID_USER', 3);


require_once(__DIR__ . '/base/autoloaders.php');
require_once('helpers/PHPMailer/PHPMailerAutoload.php');
