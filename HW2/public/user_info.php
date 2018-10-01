<?php
require "../includes/common.php";
$login = $_SESSION["login"];
$user = find($login);
if ($user === null) {
    header('Location: /index.php');
    exit;
}
require "../templates/user_info.php";