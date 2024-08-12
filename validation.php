<?php

require_once 'Repository.php';

function validateLogin($username, $password): array {
    $repository = new Repository();

    $userData = [
        'firstName' => '',
        'lastName' => '',
        'photo' => ''
    ];

    $warehouse_user = $repository->getUsername($username, $password);

    if ($warehouse_user !== null && $warehouse_user->username === $username && $warehouse_user->password === $password) {
        $userContact = $repository->getUserContact($warehouse_user->id);

        if ($userContact !== null) {
            $userData['firstName'] = $userContact->firstName;
            $userData['lastName'] = $userContact->lastName;
            $userData['photo'] = $userContact->photo;
        }
    }

    return $userData;
}