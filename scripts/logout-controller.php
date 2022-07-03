<?php

session_start();

require_once __DIR__.'/../functions/alerts.php';

// 1. Проверить корректность запроса

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    set_alert('alert alert-danger', 'Method not allowed!');

    header('Location: ../registration.php');

    exit;
}

// 2. Выход пользователя

unset($_SESSION['auth']);

set_alert('alert alert-success', 'You are logged out on the site.');

header('Location: ../index.php');
