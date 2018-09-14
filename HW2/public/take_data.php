<?php
require "../includes/common.php";
$user = $_GET["login"];
$path = USERS_DIR . "/$user.json";
$login_new = $_POST["login"];
$email = $_POST["email"];
$name = $_POST["name"];
$role = $_POST["role"];
$active = !empty($_POST["active"]);

$file = file_get_contents($path);
$temp = json_decode($file, true);

unset($file);
$new_user_data = [
    "login" => $login_new,
    "email" => $email,
    "name" => $name,
    "role" => $role,
    "active" => $active,
];
if (!empty($_POST["password"])){
    $new_user_data["password"] = hash_the_fucking_password($_POST["password"]);
}
$temp = array_merge($temp, $new_user_data);
file_put_contents($path, json_encode($temp));


rename($path, USERS_DIR . "/$login_new.json");
header("Location: /edit_user.php?login=$login_new");
