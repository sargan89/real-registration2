<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
</head>
<body>

<?php require_once __DIR__.'/templates/alerts.php'; ?>
<?php require_once __DIR__ . '/functions/users.php'; ?>

<div class="main m-5">
    <h1>Main Page</h1>
    <?php if (user_is_auth()): ?>
        <p class="logged-text">You are logged in as <strong><?php echo $_SESSION['auth']; ?></strong></p>
        <form action="scripts/logout-controller.php" method="post">
            <fieldset>
                <button class="btn btn-info" type="submit">Logout</button>
            </fieldset>
        </form>
    <?php else: ?>
        <p><a class="btn btn-info" href="auth.php">Login</a></p>
        <p><a class="btn btn-primary" href="registration.php">Registration</a></p>
    <?php endif; ?>
</div>
</body>
</html>
