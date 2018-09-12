<?php
require "common.php";
$user = $_GET["login"];
$path = USERS_DIR . "/$user.json";
$user=find($login);
$login_new = $_POST["login"];
$email = $_POST["email"];
$name = $_POST["name"];
$role = $_POST["role"];
$active = !empty($_POST["active"]);

$user["login"] = $login_new;
$user["email"] = $email;
$user["name"] = $name;
$user["role"] = $role;
$user["active"] = $active;

rename($path, USERS_DIR . "/$login_new.json");
header("Location: /HW2/edit_user.php?login=$login_new");
