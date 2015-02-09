<?php

class AuthController extends Controller {
    /**
     * user login to the site.
     * If the user has login, it returns to the main page
     */
    public function loginAction() {
        if ($this->session->isLoggedIn()) {
            $this->redirect(BASE_URL);
        }

        $this->view->msg = "";
        $this->view->login = isset($_POST['login']) ? trim($_POST['login']) : '';
        $this->view->password = isset($_POST['password']) ? trim($_POST['password']) : '';

        if (!empty($_POST)) {
            if ($this->session->login($this->view->login, $this->view->password)) {
                $this->redirect(BASE_URL);
            } else {
                $this->view->msg = 'Ошибка входа в систему';
            }
        }

        $this->view->display('auth/login');
    }

    /**
     * logout and redirect the user to the login page
     */
    public function logoutAction() {
        $this->session->logout();
        $this->redirect(Controller::url('auth', 'login'));
    }
}