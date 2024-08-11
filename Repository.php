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

    function saveContact(Contact $contact, String $partner): void {
        $stmt = $this->createConnection()->prepare('INSERT INTO contacts (
                      id, name, contact_person, address, phone, email) 
VALUES (DEFAULT, :name, :contact_person, :address, :phone, :email)');

        $stmt->bindValue(':name', $contact->name);
        $stmt->bindValue(':contact_person', $contact->contactPerson);
        $stmt->bindValue(':address', $contact->address);
        $stmt->bindValue(':phone', $contact->phone);
        $stmt->bindValue(':email', $contact->email);

        $stmt->execute();

        $conn = $this->createConnection();

        $contact_id = $conn->lastInsertId();

        $this->savePartner($contact_id, $partner);
    }

    function savePartner($id, $partner): void {
        $stmt = $this->createConnection()->prepare('INSERT INTO ' . $partner . ' (
                      id, contacts_id) 
VALUES (DEFAULT, :contacts_id)');

        $stmt->bindValue(':contacts_id', $id);

        $stmt->execute();
    }


    function getAllContacts($partner): false|array {
        $stmt = $this->createConnection()->prepare('SELECT * FROM ' . $partner);

        $stmt->execute();

        $partnerList = [];
        foreach ($stmt as $row) {

            [$id, $contactsId] = $row;
            $contact = $this->getContact($contactsId);

            $partnerList[] = $contact;
        }
        return $partnerList;
    }

    function getContact(int $id): Contact {
        $stmt = $this->createConnection()->prepare('SELECT * FROM contacts WHERE id = :id');

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $contact = $stmt->fetch(PDO::FETCH_ASSOC);

        $id = $contact['id'];
        $name = $contact['name'];
        $contactPerson = $contact['contact_person'];
        $address = $contact['address'];
        $phone = $contact['phone'];
        $email = $contact['email'];

        return new Contact($id, $name, $contactPerson, $address, $phone, $email);
    }
}
