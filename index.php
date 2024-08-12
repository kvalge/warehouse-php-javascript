<?php

session_start();

require_once 'Repository.php';
require_once 'Contact.php';
require_once 'validation.php';

$command = $_GET['command'] ?? 'login';

$login = $_POST['login'] ?? null;
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

$name = $_POST['name'] ?? null;
$contact = $_POST['contact'] ?? null;
$address = $_POST['address'] ?? null;
$phone = $_POST['phone'] ?? null;
$email = $_POST['email'] ?? null;
$id = $_GET['id'] ?? null;
$partner = $_POST['partner'] ?? null;

$firstName = '';
$lastName = '';
$photo = '';
$message = '';

// error_log("ID4: " . $id);

$repository = new Repository();

if ($command == 'login' && !$login && !$partner) {
    header("Location: templates/login.php");
    exit();
}

if ($login) {
    $validateLogin = validateLogin($username, $password);

    if (!empty($validateLogin['firstName']) && !empty($validateLogin['lastName']) && !empty($validateLogin['photo'])) {
        $firstName = $validateLogin['firstName'];
        $lastName = $validateLogin['lastName'];
        $photo = $validateLogin['photo'];

        $_SESSION['first_name'] = $firstName;
        $_SESSION['last_name'] = $lastName;
        $_SESSION['photo'] = $photo;

        header("Location: ?command=dashboard");

    } else {
        $message = "Username or password is not valid, or missing user data!";
        include 'templates/login.php';
    }
    exit();
}

if ($command == 'dashboard') {
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    $photo = $_SESSION['photo'];
    $template = "templates/homepage.php";

    include "templates/dashboard.php";
    exit();
}

    if ($command == 'homepage') {
        $firstName = $_SESSION['first_name'];
        $lastName = $_SESSION['last_name'];
        $photo = $_SESSION['photo'];

        $template = "templates/homepage.php";

        include "templates/dashboard.php";
        exit();
    }

    if ($command == 'inventory') {
        $firstName = $_SESSION['first_name'];
        $lastName = $_SESSION['last_name'];
        $photo = $_SESSION['photo'];

        $template = "templates/inventory.php";

        include "templates/dashboard.php";
        exit();
    }

    if ($command == 'order') {
        $firstName = $_SESSION['first_name'];
        $lastName = $_SESSION['last_name'];
        $photo = $_SESSION['photo'];

        $template = "templates/order.php";

        include "templates/dashboard.php";
        exit();
    }

    if ($command == 'supplier') {
        $firstName = $_SESSION['first_name'];
        $lastName = $_SESSION['last_name'];
        $photo = $_SESSION['photo'];

        $template = "templates/supplier.php";

        $partners = $repository->getAllContacts('supplier');

        include "templates/dashboard.php";
        exit();
    }

    if ($command == 'customer') {
        $firstName = $_SESSION['first_name'];
        $lastName = $_SESSION['last_name'];
        $photo = $_SESSION['photo'];

        $template = "templates/customer.php";

        $partners = $repository->getAllContacts('customer');

        include "templates/dashboard.php";
        exit();
    }

    if ($command == 'contact_details') {
        $firstName = $_SESSION['first_name'];
        $lastName = $_SESSION['last_name'];
        $photo = $_SESSION['photo'];

        $template = "templates/contact_details.php";
        $contact = $repository->getContact($id);

        include "templates/dashboard.php";
        exit();
    }

    if ($partner) {
        $firstName = $_SESSION['first_name'];
        $lastName = $_SESSION['last_name'];
        $photo = $_SESSION['photo'];

        $template = "templates/" . $partner . ".php";

        if ($name == '' or $contact == '' or $address = '' or $phone == '' or $email = '') {
            $partners = $repository->getAllContacts($partner);
            $currentCommand = $partner;
            $message = 'The entered data is not valid.';
            $messageType = 'error';

            include "templates/dashboard.php";
            exit();

        } else {
            $newContact = new Contact(null, $name, $contact, $address, $phone, $email);

            $repository->saveContact($newContact, $partner);
            $repository->getAllContacts($partner);
            $message = 'New ' . $partner . ' is saved!';
            $messageType = 'success';

            header("Location: ?command=" . $partner . "&message=" . urlencode($message) . "&messageType=" . urlencode($messageType));
        }
        exit();
    }

    if ($command == 'logout') {
        session_unset();
        session_destroy();

        header("Location: templates/login.php");
        exit();
    }

