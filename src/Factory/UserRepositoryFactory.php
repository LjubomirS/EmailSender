<?php

namespace EmailHandler\Factory;

use EmailHandler\Repository\UserRepository;
use EmailHandler\Repository\UserRepositoryFromPdo;

class UserRepositoryFactory
{
    public static function make(): UserRepository
    {
        $pdo = require __DIR__ . '/../../config/emailHandlerConn.php';
        return new UserRepositoryFromPdo($pdo);
    }
}