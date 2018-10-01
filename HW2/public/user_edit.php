<?php
require "../includes/common.php";
check_admin();
$login = $_GET["login"];
if (!empty($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
    unset($_SESSION["errors"]);
}

if (!is_user_exists($login)) {
    http_response_code(404);
    echo "User does not exists";
    exit;
}
$user = find($login); #проверка на логин
require "../templates/user_edit.php";