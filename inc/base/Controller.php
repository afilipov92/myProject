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

    public function isEditPost() {
        return isset($_POST['edit']);
    }

    public function isDeletePost() {
        return isset($_POST['delete']);
    }

    public function isAjax(){
        return (isset($_GET['ajax']) || (isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
    }

    public function renderJson($data){
        header('Content-Type: application/json');
        echo json_encode($data);
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