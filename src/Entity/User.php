<?php

declare(strict_types=1);

namespace EmailHandler\Entity;

class User
{
    public function __construct(
        private string $name = '',
        private string $email = '',
        private string $password = '',
        private ?int $userId = null,
        private int $isAdmin = 0
    )
    {
    }

    /**
     * @return ?int
     */
    public function userId(): ?int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function isAdmin(): int
    {
        return $this->isAdmin;
    }
}