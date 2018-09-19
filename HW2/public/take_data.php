<?php
require "../includes/common.php";
$user = $_GET["login"];
$path = USERS_DIR . "/$user.json";

$email = $_POST["email"];
$name = $_POST["name"];
$role = $_POST["role"];
$active = !empty($_POST["active"]);

$file = file_get_contents($path);
$temp = json_decode($file, true);

unset($file);
$new_user_data = [
    "email" => $email,
    "name" => $name,
    "role" => $role,
    "active" => $active,
    "time_edit" => gmdate("Y-m-d H:i:s"),
];

if (!empty($_POST["password"])){
    $new_user_data["password"] = hash_the_fucking_password($_POST["password"]);
}
$temp = array_merge($temp, $new_user_data);
file_put_contents($path, json_encode($temp));


#rename($path, USERS_DIR . "/$login_new.json");
header("Location: /edit_user.php?login={$temp["login"]}");
