<?php

class ErrorController extends Controller {
    /**
     * display page not found
     */
    public function notFoundAction() {
        $this->view->display('error/page-not-found');
    }

    /**
     * display class not found
     */
    public function classNotFoundAction() {
        $this->view->display('error/class-not-found');
    }
}