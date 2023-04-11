<?php

declare(strict_types=1);

namespace EmailHandler\Entity;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Email
{
    public function __construct(
        private ?UuidInterface $emailId = null,
        private ?int $userId = null,
        private string $title = '',
        private string $text = '',
    )
    {
    }

    /**
     * @return UuidInterface
     */
    public function emailId(): UuidInterface
    {
        return $this->emailId;
    }

    /**
     * @return int
     */
    public function userId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function text(): string
    {
        return $this->text;
    }
}