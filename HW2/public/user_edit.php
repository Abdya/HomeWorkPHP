<?php
require "../includes/common.php";
check_admin();
$id = $_GET["id"];
if (!empty($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
    unset($_SESSION["errors"]);
}

if (!Ino\Core\Registry::getUserProvider()->isUserExists($id)) {
    http_response_code(404);
    echo "User does not exists";
    exit;
}
$user = \Ino\Core\Registry::getUserProvider()->getUserById($id); #проверка на логин
require "../templates/user_edit.php";