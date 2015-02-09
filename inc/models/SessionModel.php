<?php

class SessionModel {

    /**
     * start session
     */
    public function __construct() {
        session_start();
    }

    /**
     * sets the captcha in the session
     * @param $captcha
     */
    public static function setCaptcha($captcha) {
        $_SESSION['captcha'] = $captcha;
    }

    /**
     * returns the captcha if it was set
     * @return string
     */
    public static function getCaptcha() {
        return isset($_SESSION['captcha']) ? $_SESSION['captcha'] : '';
    }

    /**
     * @return bool Flag if the current user logged in
     */
    public function isLoggedIn() {
        return isset($_SESSION['login']);
    }

    /**
     * @return string The current user name if he is logged
     */
    public function getName() {
        return $this->isLoggedIn() ? $_SESSION['login'] : '';
    }

    /**
     * attempt to login on the data from the form.
     * returns the result of an attempt
     * @param $login
     * @param $pass
     * @return bool
     */
    public function login($login, $pass) {
        $res = UserModel::findBy(array('login' => $login));
        $resPass = password_verify($pass, $res['password']);
        if ($res && $resPass) {
            $_SESSION['id'] = $res['id'];
            $_SESSION['login'] = $res['login'];
        }
        return (bool)$res && (bool)$resPass;
    }

    /**
     * logout, destroys the session
     */
    public function logout() {
        session_destroy();
    }
}