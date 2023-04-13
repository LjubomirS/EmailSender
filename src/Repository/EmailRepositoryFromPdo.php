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
            INSERT INTO emails (email_id, user_id, recipient_name, recipient_email, title, text)
            VALUES (:emailId, :userId, :recipientName, :recipientEmail, :title, :text)
        SQL;
    }

    private function deleteQuery() {
        return <<<SQL
            DELETE FROM emails 
            WHERE email_id = :emailId
        SQL;
    }

    public function storeEmail(Email $email): void
    {
        $sql = $this->storeQuery($email);
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':emailId' => $email->emailId(),
            ':userId' => $email->userId(),
            ':recipientName' => $email->recipientName(),
            ':recipientEmail' => $email->recipientEmail(),
            ':title' => $email->title(),
            ':text' => $email->text()
        ];

        $stm->execute($params);
    }

    public function findAllEmails(): array
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT email_id, user_id, recipient_name, recipient_email, title, text
            FROM emails
        SQL);

        $stm->execute();

        $emails = $stm->fetchAll(PDO::FETCH_ASSOC);
        $emailObjects = [];
        foreach ($emails as $email) {
            $emailObjects[] = new Email(
                $email['email_id'] = Uuid::fromString($email['email_id']),
                $email['user_id'],
                $email['recipient_name'],
                $email['recipient_email'],
                $email['title'],
                $email['text']
            );
        }

        return $emailObjects;
    }

    public function findUsersEmails(string $userId): array
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT email_id, user_id, recipient_name, recipient_email,title, text
            FROM emails
            WHERE user_id = $userId
        SQL);

        $stm->execute();

        $emails = $stm->fetchAll(PDO::FETCH_ASSOC);
        $emailObjects = [];
        foreach ($emails as $email) {
            $emailObjects[] = new Email(
                $email['email_id'] = Uuid::fromString($email['email_id']),
                $email['user_id'],
                $email['recipient_name'],
                $email['recipient_email'],
                $email['title'],
                $email['text']
            );
        }

        return $emailObjects;
    }

    public function deleteEmail(string $emailId): void
    {
        $sql = $this->deleteQuery();
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':emailId' => $emailId,
        ];

        $stm->execute($params);
    }
}