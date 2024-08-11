<?php

session_start();

require_once 'Repository.php';
require_once 'Contact.php';

$command = $_GET['command'] ?? 'login';

$login = $_POST['login'] ?? null;
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

$supplier = $_POST['supplier'] ?? null;
$customer = $_POST['customer'] ?? null;
$name = $_POST['name'] ?? null;
$contact = $_POST['contact'] ?? null;
$address = $_POST['address'] ?? null;
$phone = $_POST['phone'] ?? null;
$email = $_POST['email'] ?? null;
$id = $_GET['id'] ?? null;

$firstName = '';
$lastName = '';
$photo = '';
$message = '';

// error_log("ID4: " . $id);

$repository = new Repository();

if ($command == 'login' && !$login && !$supplier && !$customer) {
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

            $_SESSION['username'] = $username;
            $_SESSION['first_name'] = $firstName;
            $_SESSION['last_name'] = $lastName;
            $_SESSION['photo'] = $photo;

            header("Location: ?command=dashboard");
            exit();
        }

    } else {
        $message = "Username or password is not valid!";
        include 'templates/login.php';
    }
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

    $suppliers = $repository->getAllContacts('supplier');

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

if ($command == 'customer') {
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    $photo = $_SESSION['photo'];
    $template = "templates/customer.php";

    $customers = $repository->getAllContacts('customer');

    include "templates/dashboard.php";
    exit();
}

if ($supplier) {
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    $photo = $_SESSION['photo'];
    $template = "templates/supplier.php";

    if ($name == '' or $contact == '' or $address = '' or $phone == '' or $email = '') {
        $suppliers = $repository->getAllContacts('supplier');
        $currentCommand = 'supplier';
        $message = 'The entered data is not valid.';
        $messageType = 'error';

        include "templates/dashboard.php";
        exit();

    } else {
        $newContact = new Contact(null, $name, $contact, $address, $phone, $email);

        $repository->saveContact($newContact, 'supplier');
        $repository->getAllContacts('supplier');
        $message = 'New supplier is saved!';
        $messageType = 'success';

        header("Location: ?command=supplier&message=" . urlencode($message) . "&messageType=" . urlencode($messageType));
    }
    exit();
}

if ($customer) {
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    $photo = $_SESSION['photo'];
    $template = "templates/customer.php";

    if ($name == '' or $contact == '' or $address = '' or $phone == '' or $email = '') {
        $customers = $repository->getAllContacts('customer');
        $currentCommand = 'customer';
        $message = 'The entered data is not valid.';
        $messageType = 'error';

        include "templates/dashboard.php";

    } else {
        $newContact = new Contact(null, $name, $contact, $address, $phone, $email);

        $repository->saveContact($newContact, 'customer');
        $repository->getAllContacts('customer');
        $message = 'New customer is saved!';
        $messageType = 'success';

        header("Location: ?command=customer&message=" . urlencode($message) . "&messageType=" . urlencode($messageType));
    }
    exit();
}

if ($command == 'logout') {
    session_unset();
    session_destroy();

    header("Location: templates/login.php");
    exit();
}

