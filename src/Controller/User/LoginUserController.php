<?php

namespace EmailHandler\Controller\User;

use EmailHandler\Controller\SessionController;
use EmailHandler\Factory\UserRepositoryFactory;

class LoginUserController
{
    public function handle(): void
    {
        $email = trim(filter_input(INPUT_POST, 'email') ?? '');
        $password = trim(filter_input(INPUT_POST, 'password') ?? '');

        if($email === "" || $password === "" ||
            strlen($email) > 100 || strlen($password) > 100
        ){
            header('Location: /index.php');
            die;
        }

        $userRepository = UserRepositoryFactory::make();
        $user = $userRepository->findUser($email);

        $isMatched = $user && $user->password() === $password;

        if($isMatched){
            SessionController::set('logged_in',true);
            SessionController::set('logged_user',$user->name());
            SessionController::set('is_admin',$user->isAdmin());
            SessionController::set('user_id',$user->userId());
            SessionController::set('email',$user->email());
//            SessionController::set('name',$user->name());
        }else{
            header('Location: /index.php');
            die;
        }

        require_once __DIR__ . '/../../../views/emailPages/emailSendPage.php';
    }
}