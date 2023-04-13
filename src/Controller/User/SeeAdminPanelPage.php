<?php

namespace EmailHandler\Controller\User;

use EmailHandler\Factory\EmailRepositoryFactory;

class SeeAdminPanelPage
{
    public function handle(): void
    {
        $emailRepository = EmailRepositoryFactory::make();
        $emails = $emailRepository->findAllEmails();

        require_once __DIR__ . '/../../../views/userPages/adminPanelPage.php';
    }
}