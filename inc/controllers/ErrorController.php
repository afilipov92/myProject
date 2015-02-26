<?php

class ErrorController extends Controller {
    public function notFoundAction() {
        $this->view->display('error/page-not-found');
    }

    public function classNotFoundAction() {
        $this->view->display('error/class-not-found');
    }
}