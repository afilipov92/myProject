<?php

class Captcha {
    /**
     * Generates CAPTCHA. Returns string. Answer sets in session
     * @return string
     */
    public static function generateCaptcha() {
        $letters = 'ABCDEFGKIJKLMNOPQRSTUVWXYZ23456789';
        $caplen = 6;
        $captcha = '';
        for ($i = 0; $i < $caplen; $i++) {
            $captcha .= $letters[rand(0, strlen($letters) - 1)];
        }
        SessionModel::setCaptcha($captcha);
        return $captcha;
    }

    /**
     * checking validity captcha
     * @param $answ
     * @return bool
     */
    public static function isValidCaptcha($answ) {
        $rightAnsw = SessionModel::getCaptcha();
        return $answ == $rightAnsw;
    }
}