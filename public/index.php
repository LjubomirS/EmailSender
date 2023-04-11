<?php

use EmailHandler\Controller\Email\SeeEmailSendPage;
use EmailHandler\Controller\Email\SeeSentEmailsPage;
use EmailHandler\Controller\Email\SendStoreEmailController;
use EmailHandler\Controller\SessionController;
use EmailHandler\Controller\User\LoginUserController;
use EmailHandler\Controller\User\LogoutUserController;
use EmailHandler\Controller\User\RegisterUserController;
use EmailHandler\Controller\User\SeeLoginPage;
use EmailHandler\Controller\User\SeeRegisterPage;

require_once __DIR__ . '/../vendor/autoload.php';

SessionController::start();
//session_destroy();


$action = filter_input(INPUT_GET, 'action');

match ($action) {
    'logout-user' =>  (new LogoutUserController())->handle(),
    'login-user' => (new LoginUserController())->handle(),
    'send-store-email' => (new SendStoreEmailController())->handle(),
    'register-user' => (new RegisterUserController())->handle(),
    'see-email-send-page' => (new SeeEmailSendPage())->handle(),
    'see-sent-emails-page' => (new SeeSentEmailsPage())->handle(),
    'see-register-page' => (new SeeRegisterPage())->handle(),
    default => (new SeeLoginPage())->handle()
};