<?php

namespace EmailHandler\Controller\Email;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class EmailSender
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->CharSet = 'UTF-8';
    }

    public function send($from, $fromName, $to, $toName, $subject, $body):bool
    {
        try {
            // Set the mailer to use the PHP mail() function
            $this->mail->isMail();

            // Set the recipient, subject, and body of the email
            $this->mail->setFrom($from, $fromName);
            $this->mail->addAddress($to, $toName);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            // Send the email
            if($this->mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch(Exception $e) {
            return false;
        }
    }
}

//        $sender = new EmailSender();
//        $from = $senderEmail;
//        $fromName = $senderName;
//        $to = $recipientEmail;
//        $toName = $name;
//        $subject = $title;
//        $body = $text;
//
//        if($sender->send($from, $fromName, $to, $toName, $subject, $body)) {
//            echo 'Email sent successfully';
//            die;
//        } else {
//            echo 'Error: Email not sent';
//            die;
//        }