<?php
require "common.php";
$user = $_GET["login"];
$path = USERS_DIR . "/$user.json";
#$user=find($login);
$login_new = $_POST["login"];
$email = $_POST["email"];
$name = $_POST["name"];
$role = $_POST["role"];
$active = !empty($_POST["active"]);

$file = file_get_contents($path);
$temp = json_decode($file, true);

unset($file);
$temp[] = array(
    "login" => $login_new,
    "email" => $email,
    "name" => $name,
    "role" => $role,
    "active" => $active
);
file_put_contents($path, json_encode($temp));


rename($path, USERS_DIR . "/$login_new.json");
header("Location: /HW2/edit_user.php?login=$login_new");
