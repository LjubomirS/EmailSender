<?php

namespace EmailHandler\Repository;

use EmailHandler\Entity\User;

interface UserRepository
{
    public function registerUser(User $user): void;
}