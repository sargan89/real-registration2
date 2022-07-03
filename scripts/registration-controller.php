<?php

session_start();

require_once __DIR__.'/../functions/alerts.php';
require_once __DIR__ . '/../functions/database.php';
require_once __DIR__ . '/../functions/users.php';

// 1. Check request method

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    set_alert('alert alert-danger', 'Method not allowed!');

    header('Location: ../registration.php');

    exit;
}

// 2. Check data

if (!$_POST['email'] || !$_POST['password']) {
    set_alert('alert alert-danger', 'E-mail and password are required!');

    header('Location: ../registration.php');

    exit;
}

$email    = trim($_POST['email']);
$password = md5($_POST['password']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    set_alert('alert alert-danger', 'Invalid e-mail address!');

    header('Location: ../registration.php');

    exit;
}

// 3. Create new user

$database = database_connect();

$userArr = [
    'email'    => $email,
    'password' => $password
];

$isRegister = user_register($database, $userArr);

if (!$isRegister) {
    set_alert('alert alert-warning', 'User already exists! Please register another email.');
    header('Location: ../registration.php');
    exit;
}

set_alert('alert alert-success', 'Success! You have created a new account. Please login now.');
header('Location: ../auth.php');
