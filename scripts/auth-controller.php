<?php

session_start();

require_once __DIR__.'/../functions/alerts.php';
require_once __DIR__ . '/../functions/database.php';
require_once __DIR__ . '/../functions/users.php';

// 1. Проверить корректность запроса

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    set_alert('alert alert-danger', 'Method not allowed!');

    header('Location: ../auth.php');

    exit;
}

// 2. Проверить данные

if (!$_POST['email'] || !$_POST['password']) {
    set_alert('alert alert-danger', 'E-mail and password are required!');

    header('Location: ../auth.php');

    exit;
}

$email    = trim($_POST['email']);
$password = md5($_POST['password']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    set_alert('alert alert-danger', 'Invalid e-mail address!');

    header('Location: ../auth.php');

    exit;
}

// 3. Проверить наличие пользователя

$database = database_connect();

$isLogin = user_auth($database, $email, $password);

if (!$isLogin) {
    set_alert('alert alert-warning', 'Not existing email or the password is entered incorrectly!');
    header('Location: ../auth.php');
    exit;
}

// 4. Сохраняем данные аутентификации

$_SESSION['auth'] = $email;

set_alert('alert alert-success', 'Welcome!');

header('Location: ../index.php');
