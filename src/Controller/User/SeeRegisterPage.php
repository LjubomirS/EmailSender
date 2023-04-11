<?php

namespace EmailHandler\Controller\User;

class SeeRegisterPage
{
    public function handle(): void
    {
        require_once __DIR__ . '/../../../views/userPages/registerPage.php';
    }
}