<?php

namespace EmailHandler\Controller\Email;

use EmailHandler\Factory\EmailRepositoryFactory;

class DeleteEmailController
{
    public function handle(): void
    {
        $emailId = (string)filter_input(INPUT_GET, 'emailId');

        $emailRepository = EmailRepositoryFactory::make();
        $emailRepository->deleteEmail($emailId);

        header('Location: /index.php?action=see-admin-panel-page');
    }
}