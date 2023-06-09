<?php

namespace EmailHandler\Controller\Email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSenderSmtp {
    private $mailer;

    public function __construct() {
        $this->mailer = new PHPMailer(true); // stvaranje novog PHPMailer objekta

        // Konfiguracija PHPMailer-a
        $this->mailer->isSMTP();
        $this->mailer->Host = '#'; // smtp server adresa
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = '#'; // korisničko ime za SMTP autentifikaciju
        $this->mailer->Password = '#'; // lozinka za SMTP autentifikaciju
        $this->mailer->SMTPSecure = #; // enkripcija
        $this->mailer->Port = #; // SMTP port
    }


    public function sendEmail($to, $subject, $body) {
        try {
            // Postavljanje parametara za email
            $this->mailer->setFrom('test@maniapanel.win', 'Test');
            $this->mailer->addAddress($to);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            // Slanje email-a
            $this->mailer->send();
            echo 'Success';
        } catch (Exception $e) {
            echo 'Error: ', $e->getMessage();
        }
    }

    public function __destruct() {
        $this->mailer = null; // Uništavanje PHPMailer objekta
    }
}

