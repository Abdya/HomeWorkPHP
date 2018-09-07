<?php
require "common.php";
$error=null;
if (!empty($_POST['enter_login']) || !empty($_POST['enter_password'])) {
    $enter_login = $_POST['enter_login'];
    $enter_password = $_POST['enter_password'];
    $user = find($enter_login);

    if ($user === null || !password_verify($enter_password, $user["password"])) {
        $error='GO OUT OF HERE FUCKING JABA!';
    } else {
        header("Location: /HW2/info.php?login=$enter_login");
        exit;
    }
}
require "templates/honey.php";
