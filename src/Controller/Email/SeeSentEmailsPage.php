<?php

namespace EmailHandler\Controller\Email;

use EmailHandler\Factory\EmailRepositoryFactory;

class SeeSentEmailsPage
{
    public function handle(): void
    {
        $emailRepository = EmailRepositoryFactory::make();
        $emails = $emailRepository->findAllEmails();

//        echo '<pre>';
//        var_dump($emails);
//        die;

        require_once __DIR__ . '/../../../views/EmailPages/sentEmailsPage.php';
    }
}