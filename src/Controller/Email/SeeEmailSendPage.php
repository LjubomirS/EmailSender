<?php

namespace EmailHandler\Controller\Email;

class SeeEmailSendPage
{
    public function handle(): void
    {
        require_once __DIR__ . '/../../../views/EmailPages/emailSendPage.php';
    }
}