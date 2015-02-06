<?php

class RegistrationController extends Controller {

    /**
     * форма регистрации, проверяет валидность данных формы, каптчу
     * в случае правильности отправляет письмо пользователю на email для подтверждения регистрации
     * и добавляет пользователя в базу данных
     */
    public function indexAction() {

        $newUser = new UserModel();
        $this->view->result = "";
        if ($this->isPost()) {
            $newUser->setAttributes($_POST);
            $captcha = Captcha::isValidCaptcha($_POST['captcha']);
            if ($newUser->isFormVaild() AND $captcha) {
                if (MailModel::goMail($newUser->login, $newUser->email)) {
                    if ($newUser->addUser()) {
                        $this->view->result = "Вы успешно зарегистрировались";
                    } else {
                        $this->view->result = "Ошиба регистрации";
                    }
                } else {
                    $this->view->gbErrors['mail'] = "Ошибка отправки письма";
                }
            } else {
                $this->view->gbErrors = $newUser->getErrors();
                if (!$captcha) {
                    $this->view->gbErrors['captcha'] = "Каптча не валидна";
                }
            }
        }
        $this->view->msg = $newUser;
        $this->view->display('registration/form');
    }
}