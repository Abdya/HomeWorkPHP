<?php
require "../includes/common.php";
if (!empty($_GET)) {
    $id = $_GET["id"];
    $token = $_GET["token"];
    $_SESSION["id"] = $id;
    $_SESSION["token"] = $token;
}

if (!empty($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
    unset($_SESSION["errors"]);
}

require "../templates/new_password.php";
