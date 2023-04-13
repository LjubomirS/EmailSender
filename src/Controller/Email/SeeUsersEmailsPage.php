<?php

namespace EmailHandler\Controller\Email;

use EmailHandler\Controller\SessionController;
use EmailHandler\Factory\EmailRepositoryFactory;

class SeeUsersEmailsPage
{
    public function handle(): void
    {
        $userId = SessionController::get('user_id');
        $emailRepository = EmailRepositoryFactory::make();
        $usersEmails = $emailRepository->findUsersEmails($userId);

        require_once __DIR__ . '/../../../views/EmailPages/sentEmailsPage.php';
    }
}