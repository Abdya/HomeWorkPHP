<?php
require "../includes/common.php";
$login = $_GET["login"];
$token = $_GET["token"];
$user_data = find($login);
#if ($user_data["token"] !== $token){

?>