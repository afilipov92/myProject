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
     * @return string - URL
     */
    public static function url() {
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
     * check clicking the edit button
     * @return bool
     */
    public function isEditPost() {
        return isset($_POST['edit']);
    }

    /**
     * check clicking the delete button
     * @return bool
     */
    public function isDeletePost() {
        return isset($_POST['delete']);
    }

    /**
     * check send Ajax request
     * @return bool
     */
    public function isAjax() {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }

    /**
     * render of data in json
     * @param $data
     */
    public function renderJson($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * Redirects the user to the address
     * @param $url
     */
    public function redirect($url) {
        header('Location: ' . $url);
        die;
    }
}