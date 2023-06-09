<?php

namespace EmailHandler\Controller\Email;

use EmailHandler\Factory\EmailRepositoryFactory;

class SeeSentEmailsPage
{
    public function handle(): void
    {
        $emailRepository = EmailRepositoryFactory::make();
        $emails = $emailRepository->findAllEmails();

        require_once __DIR__ . '/../../../views/EmailPages/sentEmailsPage.php';
    }
}