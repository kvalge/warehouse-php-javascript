<?php

require_once 'data/db_connection.php';
require_once 'User.php';
require_once 'UserContact.php';

class Repository
{
    public ?PDO $conn = null;

    function createConnection(): ?PDO {
        if ($this->conn === null) {
            $this->conn = getConnection();
        }
        return $this->conn;
    }

    function getUsername(string $username, string $password): ?User {
        $stmt = $this->createConnection()->prepare(
            'SELECT * FROM user_account WHERE username = :username AND password = :password');

        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return new User($user['id'], $user['username'], $user['password']);
        } else {
            return null;
        }
    }

    function getUserContact(string $userAccountId): ?UserContact {
        $stmt = $this->createConnection()->prepare(
            'SELECT * FROM user_contact WHERE user_account_id = :userAccountId');

        $stmt->bindValue(':userAccountId', $userAccountId);

        $stmt->execute();

        $contacts = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($contacts) {
            return new UserContact(
                null,
                $contacts['user_account_id'],
                $contacts['first_name'],
                $contacts['last_name'],
                $contacts['email'],
                $contacts['photo']);
        } else {
            return null;
        }
    }
}
