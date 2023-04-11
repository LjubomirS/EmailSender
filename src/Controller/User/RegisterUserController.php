<?php

namespace EmailHandler\Controller\User;

use EmailHandler\Entity\User;
use EmailHandler\Factory\UserRepositoryFactory;

class RegisterUserController
{
    public function handle(): void
    {
        $name = trim(filter_input(INPUT_POST, 'name') ?? '');
        $email = trim(filter_input(INPUT_POST, 'email') ?? '');
        $password = trim(filter_input(INPUT_POST, 'password') ?? '');

        if($name === "" || $email === "" || $password === "" ||
            strlen($name) > 100 || strlen($email) > 100 || strlen($password) > 100
        ){
            header('Location: /index.php');
            die;
        }

        $user = new User(
            $name,
            $email,
            $password
        );

        $userRepository = UserRepositoryFactory::make();
        $userRepository->registerUser($user);

        header('Location: /index.php');
    }
}