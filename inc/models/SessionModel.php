<?php

class SessionModel {

    public function __construct() {
        session_start();
    }
    /**
     * устанавливает значение каптчи в сессию
     * @param $captcha
     */
    public static function setCaptcha($captcha) {
        $_SESSION['captcha'] = $captcha;
    }

    /**
     * возвращает каптчу, если она была установлена
     * @return string
     */
    public static function getCaptcha() {
        return isset($_SESSION['captcha']) ? $_SESSION['captcha'] : '';
    }
}