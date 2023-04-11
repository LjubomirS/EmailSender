<?php

namespace EmailHandler\Repository;

use EmailHandler\Entity\Email;
use PDO;
use Ramsey\Uuid\Uuid;

class EmailRepositoryFromPdo implements EmailRepository
{
    public function __construct(private \PDO $pdo)
    {
    }

    private function storeQuery(Email $email) {
        return <<<SQL
            INSERT INTO emails (email_id, user_id, title, text)
            VALUES (:emailId, :userId, :title, :text)
        SQL;
    }

    public function storeEmail(Email $email): void
    {
        $sql = $this->storeQuery($email);
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':emailId' => $email->emailId(),
            ':userId' => $email->userId(),
            ':title' => $email->title(),
            ':text' => $email->text()
        ];

//        echo '<pre>';
//        var_dump($params);
//        die;

        $stm->execute($params);
    }

    public function findAllEmails(): array
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT email_id, user_id, title, text
            FROM emails
        SQL);

        $stm->execute();

        $emails = $stm->fetchAll(PDO::FETCH_ASSOC);
        $emailObjects = [];
        foreach ($emails as $email) {
            $emailObjects[] = new Email(
                $email['email_id'] = Uuid::fromString($email['email_id']),
                $email['user_id'],
                $email['title'],
                $email['text']
            );
        }

        return $emailObjects;
    }
}