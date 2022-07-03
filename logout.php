<?php
session_start();

require __DIR__ . '/templates/alerts.php';

unset($_SESSION['auth']);

set_alert('alert alert-success', 'You are logged out on the site.');

header('Location: ./index.php');
