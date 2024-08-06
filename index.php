<?php

session_start();

require_once 'Repository.php';

$command = $_GET['command'] ?? 'login';

$login = $_POST['login'] ?? null;
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$firstName = '';
$lastName = '';
$photo = '';
$message = '';

// error_log("FN: " . $firstName);

$repository = new Repository();

if ($command == 'login' && !$login) {
    header("Location: templates/login.php");
    exit();
}

if ($login) {
    if ($repository->getUsername($username, $password) != null) {
        $warehouse_user = $repository->getUsername($username, $password);

        if ($warehouse_user->username == $username && $warehouse_user->password == $password) {

            $userContact = $repository->getUserContact($warehouse_user->id);
            $firstName = $userContact->firstName;
            $lastName = $userContact->lastName;
            $photo = $userContact->photo;

            session_start();

            $_SESSION['username'] = $username;
            $_SESSION['first_name'] = $firstName;
            $_SESSION['last_name'] = $lastName;
            $_SESSION['photo'] = $photo;

            header("Location: ?command=homepage");
            exit();
        }

    } else {
        $message = "Username or password is not valid!";
        include 'templates/login.php';
    }
}

if ($command == 'homepage') {
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    $photo = $_SESSION['photo'];

    include "templates/homepage.php";
    exit();
}

if ($command == 'inventory') {
    header("Location: templates/inventory.php");
    exit();
}

