<?php

class Router {
    /**
     * Selects the controller, the controller method, passes parameters
     * @TODO добавить классы исключений
     */
    public static function run() {
        $url = isset($_GET['url']) ? trim($_GET['url']) : DEFAULT_CONTROLLER;

        // split a string by /
        $parts = explode('/', rtrim($url, '/'));
        // extract a slice of the array offset 2
        $actionParams = array_slice($parts, 2);
        // controller name. Format: NameController
        $controllerName = ucfirst($parts[0]) . 'Controller';
        // new object
        $controller = new $controllerName();
        // controller selects the method
        $action = isset($parts[1]) ? $parts[1] . 'Action' : 'indexAction';
        // attempt to call a method from the controller
        if (method_exists($controller, $action)) {
            call_user_func_array(array($controller, $action), $actionParams);
        } else {
            throw new Exception("Такой метод не существует");
        }

    }
}