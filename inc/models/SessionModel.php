<?php

class SessionModel {

    /**
     * start session
     */
    public function __construct() {
        // Add a check, because on error, we will create a new controller
        // avoid the occurrence of errors 'session already started'
        if (session_id() == '') {
            session_start();
        }
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
     * returns flag if the current user logged in
     * @return bool
     */
    public function isLoggedIn() {
        return isset($_SESSION['login']);
    }

    /**
     * returns the current user name if he's logged
     * @return string
     */
    public function getName() {
        return $this->isLoggedIn() ? $_SESSION['login'] : '';
    }

    /**
     * returns the id of the user if he's logged
     * @return string
     */
    public function getId() {
        return $this->isLoggedIn() ? $_SESSION['id'] : '';
    }

    /**
     * returns the id of the user if he's logged
     * @return string
     */
    public function getIdStatus() {
        return $this->isLoggedIn() ? $_SESSION['idStatus'] : '';
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
            $_SESSION['idStatus'] = $res['id_status'];
        }
        return (bool)$res && (bool)$resPass;
    }

    /**
     * returns the id_status of the user if he's logged
     * @return string
     */
    public function isAccess() {
        return $this->isLoggedIn() ? $_SESSION['id'] : '';
    }

    /**
     * logout, destroys the session
     */
    public function logout() {
        session_destroy();
    }
}