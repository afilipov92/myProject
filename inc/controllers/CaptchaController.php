<?php

class CaptchaController extends Controller {
    /**
     * Generates CAPTCHA
     */
    public function indexAction() {
        $captcha = Captcha::generateCaptcha();
        $img = new Image($captcha);
        $img->send();
    }
}