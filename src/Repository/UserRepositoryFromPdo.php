<?php

namespace EmailHandler\Repository;

use EmailHandler\Entity\User;
use PDO;

class UserRepositoryFromPdo implements UserRepository
{
    public function __construct(private \PDO $pdo)
    {
    }

    private function storeQuery(User $user) {
//        if ($user->userId()) {
//            return <<<SQL
//                UPDATE users
//                SET name=:name,
//                    email=:email,
//                    password=:password,
//                    is_admin=:isAdmin
//                WHERE user_id=:userId
//            SQL;
//        }

        return <<<SQL
            INSERT INTO users (name, email, password, is_admin)
            VALUES (:name, :email, :password, :isAdmin)
        SQL;
    }

    public function registerUser(User $user): void
    {
        $sql = $this->storeQuery($user);
        $stm = $this->pdo->prepare($sql);

        $params = [
            ':name' => $user->name(),
            ':email' => $user->email(),
            ':password' => $user->password(),
            ':isAdmin' => $user->isAdmin()
        ];

//        if ($user->userId()) {
//            $params[':userId'] = $user->userId();
//        }

        $stm->execute($params);
    }

    public function findUser(string $email): ?User
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT user_id AS userId, name, email, password, is_admin AS isAdmin
            FROM users
            WHERE email=:email
        SQL);

        $stm->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, User::class);
        $stm->bindParam(':email', $email);
        $stm->execute();

        return $stm->fetch();
    }
}