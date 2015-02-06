<?php

class CaptchaController extends Controller {
    /**
     * генерирует каптчу
     */
    public function indexAction() {
        $captcha = Captcha::generateCaptcha();
        $img = new Image($captcha);
        $img->send();
    }
}