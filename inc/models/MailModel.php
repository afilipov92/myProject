<?php

class MailModel {
    /**
     * generates an message to the user and sends it to the email
     * @param $userName
     * @param $userEmail
     * @return bool
     */
    public static function goMail($userName, $userEmail) {
        $mail = new PHPMailer();
        $message = sprintf(MESSAGE_MAIL, $userName, BASE_URL, md5($userName));
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPKeepAlive = true;
        $mail->SMTPSecure = SMTP_SEC;
        $mail->Host = MAIL_HOST;
        $mail->Port = MAIL_PORT;
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;

        $mail->SetFrom(MAIL_USERNAME);
        $mail->CharSet = CHAR_SET;
        $mail->Subject = THEME_MAIL;
        $mail->MsgHTML($message);
        $mail->AddAddress($userEmail);
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
}