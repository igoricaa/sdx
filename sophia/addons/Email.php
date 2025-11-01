<?php

namespace Sophia\Addon;

class Email
{
    static function send($subject, $body, $receiever, $receiever_name = false, $html = true, $Unsubscribe = false)
    {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host   = EMAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = EMAIL_USERNAME;
            $mail->Password   = EMAIL_PASSWORD;
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port   = 587;
            $mail->setFrom(EMAIL_USERNAME, EMAIL_NAME);
            $mail->addReplyTo(EMAIL_USERNAME, EMAIL_NAME);
            if ($receiever_name)
                $mail->addAddress($receiever, $receiever_name);
            else
                $mail->addAddress($receiever);
            if ($Unsubscribe) $mail->addCustomHeader("List-Unsubscribe", '<admin@vukforexa.com>, <https://vukforexa.com/?email=' . $receiever . '>');
            $mail->isHTML($html);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = \Soundasleep\Html2Text::convert($mail->Body);
            return $mail->send();
        } catch (\Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    static function shopping($body, $receiever, $subject)
    {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host   = EMAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = EMAIL_USERNAME;
            $mail->Password   = EMAIL_PASSWORD;
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port   = 587;
            $mail->setFrom(EMAIL_USERNAME, EMAIL_NAME." - Boosts your productivity");
            $mail->addReplyTo(EMAIL_USERNAME, EMAIL_NAME." - Boosts your productivity");
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/assets/img/logo.png', 'logo_2u');
            $mail->addAddress($receiever);
            $mail->isHTML(true);
	    $mail->addCC('info@smartdrugsx.co');
            $mail->Subject = $subject;
            $mail->Body = $body;
            return $mail->send();
        } catch (\Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    static function support($body, $email, $name, $subject)
    {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host   = EMAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = EMAIL_USERNAME;
            $mail->Password   = EMAIL_PASSWORD;
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port   = 587;
            $mail->setFrom($email, $name." - Contact form");
            $mail->addReplyTo($email, $name." - Contact form");
            $mail->addAddress("info@smartdrugsx.co");
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $body = str_replace('â€™', "'", $body);
            $body = str_replace("â€™", "'", $body);
            $body = nl2br($body);
            $mail->Body = $body;
            return $mail->send();
        } catch (\Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
