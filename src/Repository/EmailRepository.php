<?php

namespace EmailHandler\Repository;

use EmailHandler\Entity\Email;

interface EmailRepository
{
    public function storeEmail(Email $email);
}