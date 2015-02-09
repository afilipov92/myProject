<?php

class RegistrationController extends Controller {

    /**
     * Registration form, checks the validity of the form data, CAPTCHA.
     * Adds the user into the database
     */
    public function indexAction() {
        if ($this->session->isLoggedIn()) {
            $this->redirect(BASE_URL);
        }
        $newUser = new UserModel();
        $this->view->result = "";
        if ($this->isPost()) {
            $newUser->setAttributes($_POST);
            $captcha = Captcha::isValidCaptcha($_POST['captcha']);
            if ($newUser->isFormVaild() AND $captcha) {
                if ($newUser->addUser()) {
                    $this->view->result = "Вы успешно зарегистрировались";
                } else {
                    $this->view->result = "Ошиба регистрации";
                }
            } else {
                $this->view->gbErrors = $newUser->getErrors();
                if (!$captcha) {
                    $this->view->gbErrors['captcha'] = "Каптча не валидна";
                }
            }
        }
        $this->view->data = $newUser;
        $this->view->display('registration/form');
    }
}