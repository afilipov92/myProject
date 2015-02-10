<?php

class Controller {
    /**
     * @var View
     */
    protected $view;
    /**
     * @var SessionModel
     */
    protected $session;

    /**
     * Creates objects: View and SessionModel
     */
    public function __construct() {
        $this->view = new View();
        $session = new SessionModel();
        $this->session = $session;
        $this->view->session = $this->session;
    }

    /**
     * Returns the URL for the parameters.
     * The number of parameters - at least one
     * @param $controller
     * @return string - URL
     */
    public static function url($controller) {
        $args = func_get_args();
        return BASE_URL . implode("/", $args);
    }

    /**
     * Checks the form submission
     * @return bool
     */
    public function isPost() {
        return !empty($_POST);
    }

    /**
     * Redirects the user to the address
     * @param $url
     */
    public function redirect($url)
    {
        header('Location: ' . $url);
        die;
    }
}