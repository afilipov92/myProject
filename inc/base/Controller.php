<?php

class Controller {

    protected $view;
    protected $session;

    /**
     * создает объекты View и SessionModel
     */
    public function __construct() {
        $this->view = new View();
        $this->session = new SessionModel();
    }

    /**
     * Возвращает URL для указанных параметров
     * Число параметров - не менее одного
     * @param $controller
     * @return mixed
     */
    public static function url($controller) {
        $args = func_get_args();
        $a = BASE_URL . implode("/", $args);
        return $a;
    }

    /**
     * проверяет была ли отправлена форма
     * @return bool
     */
    public function isPost() {
        return !empty($_POST);
    }
}