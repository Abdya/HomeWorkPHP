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

require "../templates/new_password.php";