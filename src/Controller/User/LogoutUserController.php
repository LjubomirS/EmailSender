<?php

namespace EmailHandler\Controller\User;

use EmailHandler\Controller\SessionController;

class LogoutUserController
{
    public function handle(): void
    {
        SessionController::remove('logged_in');
        SessionController::remove('logged_user');
        SessionController::remove('user_id');
        SessionController::remove('is_admin');
        SessionController::remove('email');
        header('Location: /index.php');
        die;
    }
}