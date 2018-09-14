<?php
require "config.php";
function is_user_exists($enter_login){
    return file_exists(USERS_DIR."/$enter_login.json");
}
function find($enter_login)
{
    $filename = dirname(__FILE__) . "/users/$enter_login.json";

    if (file_exists($filename))
    {
        $tmp_login = file_get_contents("./users/$enter_login.json");
        $tmp_login = json_decode($tmp_login, true);
        return $tmp_login;
    }

    return null;
}
function parse()
{
    $user_list_tmp = [];
    foreach (glob(USERS_DIR."/*.json") as $filename)
    {
        $user = file_get_contents("$filename");
        $user = json_decode($user, true);
        array_push($user_list_tmp, $user);
    }

    return $user_list_tmp;
}
$roles = [
    "user" => "User",
    "godzila" => "Godzila",
    "motherfucker" => "MAFucker",
    "admin" => "Admin",
];
function hash_the_fucking_password($password){
    return password_hash($password, PASSWORD_BCRYPT);
}
function verify_the_fucking_password($password, $password_hash){
    return password_verify($password, $password_hash);
}
