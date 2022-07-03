<?php

session_start();

require_once __DIR__.'/../functions/alerts.php';

// 1. Check request method

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    set_alert('alert alert-danger', 'Method not allowed!');

    header('Location: ../registration.php');

    exit;
}

// 2. User logout

setcookie('auth', null, -1, '/');

set_alert('alert alert-success', 'You are logged out on the site.');

header('Location: ../index.php');
