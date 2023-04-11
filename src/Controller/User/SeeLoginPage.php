<?php

namespace EmailHandler\Controller\User;

class SeeLoginPage
{
    public function handle(): void
    {
        require_once __DIR__ . '/../../../views/userPages/loginPage.php';
    }
}