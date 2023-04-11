<?php

namespace EmailHandler\Factory;

use EmailHandler\Repository\EmailRepository;
use EmailHandler\Repository\EmailRepositoryFromPdo;

class EmailRepositoryFactory
{
    public static function make(): EmailRepository
    {
        $pdo = require __DIR__ . '/../../config/emailHandlerConn.php';
        return new EmailRepositoryFromPdo($pdo);
    }
}