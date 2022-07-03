<?php

session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth</title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
</head>
<body>

<?php require __DIR__.'/templates/alerts.php'; ?>

<div class="main m-5">
    <h1>Login page</h1>

    <form action="scripts/auth-controller.php" method="post">
        <fieldset>
            <p>
                <label for="email">E-mail</label>
                <br>
                <input type="email" name="email" class="form-control" id="email" required>
            </p>
            <p>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" class="form-control" id="password" required>
            </p>
            <button class="btn btn-primary" type="submit">Login</button>
        </fieldset>
    </form>
    <br>
    <a href="index.php">Return to the Main page</a>
</div>

</body>
</html>
