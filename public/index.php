<?php

use EmailHandler\Controller\Email\DeleteEmailController;
use EmailHandler\Controller\Email\SeeEmailSendPage;
use EmailHandler\Controller\Email\SeeSentEmailsPage;
use EmailHandler\Controller\Email\SeeUsersEmailsPage;
use EmailHandler\Controller\Email\SendStoreEmailController;
use EmailHandler\Controller\SessionController;
use EmailHandler\Controller\User\LoginUserController;
use EmailHandler\Controller\User\LogoutUserController;
use EmailHandler\Controller\User\RegisterUserController;
use EmailHandler\Controller\User\SeeAdminPanelPage;
use EmailHandler\Controller\User\SeeLoginPage;
use EmailHandler\Controller\User\SeeRegisterPage;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../boot.php';

SessionController::start();

$action = filter_input(INPUT_GET, 'action');

match ($action) {
    'see-users-emails-page' => (new SeeUsersEmailsPage())->handle(),
    'delete-email' => (new DeleteEmailController())->handle(),
    'see-admin-panel-page' => (new SeeAdminPanelPage())->handle(),
    'logout-user' =>  (new LogoutUserController())->handle(),
    'login-user' => (new LoginUserController())->handle(),
    'send-store-email' => (new SendStoreEmailController())->handle(),
    'register-user' => (new RegisterUserController())->handle(),
    'see-email-send-page' => (new SeeEmailSendPage())->handle(),
    'see-sent-emails-page' => (new SeeSentEmailsPage())->handle(),
    'see-register-page' => (new SeeRegisterPage())->handle(),
    default => (new SeeLoginPage())->handle()
};