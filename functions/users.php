<?php

function user_register(PDO $database, array $data): bool
{
    // Check if user exists
    $email    = $data['email'];
    $password = $data['password'];

    $queryString = 'SELECT * FROM `users` WHERE `email` = :email';
    $statement = $database->prepare($queryString);
    $statement->execute(['email' => $email]);

    if ($statement->fetch()) {
        return false;
    }

    //create new user
    $queryString = '
        INSERT INTO `users` (`email`, `password`)
        VALUES (?, ?)
    ';
    $statement = $database->prepare($queryString);
    $statement->execute([
        $email,
        $password
    ]);
    return true;
}

function user_auth(PDO $database, string $login, string $password): bool
{
    $queryString = 'SELECT * FROM `users` WHERE `email` = :email AND `password` = :password';
    $statement = $database->prepare($queryString);
    $statement->execute(
        [
            'email' => $login,
            'password' => $password
        ]
    );
    return (bool)$statement->fetch();
}

function user_is_auth(): bool
{
    return (bool)!empty($_COOKIE['auth']);
}