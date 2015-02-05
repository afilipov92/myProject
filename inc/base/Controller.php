<?php

class Controller {

    protected $view;

    /**
     * создает объект View
     */
    public function __construct() {
        $this->view = new View();
    }
    /**
     * метод по умолчанию
     */
    public function indexAction() {
        echo __METHOD__ . "<br/>";
    }

    /**
     * Возвращает URL для указанных параметров
     * Число параметров - не менее одного
     * @param $controller
     * @return mixed
     */
    public static function url($controller) {
        $args = func_get_args();
        return BASE_URL . implode("/", $args);
    }
}