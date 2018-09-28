<?php
require "../includes/common.php";
if (!empty($_GET)) {
    $login = $_GET["login"];
    $token = $_GET["token"];
    $_SESSION["login"] = $login;
    $_SESSION["token"] = $token;
}

if (!empty($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
    unset($_SESSION["errors"]);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/images/jaba.gif">

    <title>Jaba Reset</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" novalidate action="/new_password_logic.php" method="post">
    <h1 class="h3 mb-4 font-weight-normal">Change your password</h1>
    <p class="mb-1 text-left">Enter new password</p>
    <input type="text" id="inputPassword" class="form-control mb-4" required autofocus name="pass">
    <p class="mb-1 text-left">Confirm password</p>
    <input type="text" id="inputPassword" class="form-control mb-3" required autofocus name="confirm_pass">
    <p class="mb-3 text-left"><?php echo !empty($errors["confirm_pass"]) ? $errors["confirm_pass"] : "" ?></p>
    <button class="btn btn-lg btn-success btn-block mb-3" type="submit">Save</button>
</form>
</body>
</html>