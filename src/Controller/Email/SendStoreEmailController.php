<?php

namespace EmailHandler\Controller\Email;

use EmailHandler\Controller\SessionController;
use EmailHandler\Entity\Email;
use EmailHandler\Factory\EmailRepositoryFactory;
use Ramsey\Uuid\Uuid;

class SendStoreEmailController
{
    public function handle(): void
    {
        $recipientName = trim(filter_input(INPUT_POST, 'name') ?? '');
        $recipientEmail = trim(filter_input(INPUT_POST, 'recipientEmail') ?? '');
        $title = trim(filter_input(INPUT_POST, 'title') ?? '');
        $text = trim(filter_input(INPUT_POST, 'text') ?? '');

        if($recipientName === "" || $recipientEmail === "" || $title === "" || $text === "" ||
            strlen($recipientName) > 100 || strlen($recipientEmail) > 100 || strlen($title) > 300 || strlen($text) > 3000
        ){
            header('Location: /index.php?action=see-email-send-page');
            die;
        }

        $userId = SessionController::get('user_id');

        $email = new Email(
            Uuid::uuid4(),
            $userId,
            $recipientName,
            $recipientEmail,
            $title,
            $text
        );

        $emailRepository = EmailRepositoryFactory::make();
        $emailRepository->storeEmail($email);

        $emailSender = new EmailSenderSmtp();
        $emailSender->sendEmail($recipientEmail, $title, $text);

        header('Location: /index.php?action=see-email-send-page');
    }
}