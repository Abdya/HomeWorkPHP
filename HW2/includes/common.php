<?php
require "config.php";
function is_user_exists($enter_login){
    return file_exists(USERS_DIR."/$enter_login.json");
}
function find($enter_login)
{
    $filename = USERS_DIR . "/$enter_login.json";

    if (file_exists($filename))
    {
        $tmp_login = file_get_contents(USERS_DIR . "/$enter_login.json");
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
function login_time($login){
    $path = USERS_DIR . "/$login.json";
    $file = file_get_contents($path);
    $temp = json_decode($file, true);
    $new_data = ["time_login" => gmdate("Y-m-d H:i:s")];
    $temp = array_merge($temp, $new_data);
    file_put_contents($path, json_encode($temp));
};
function check_admin(){
    if (empty($_SESSION["login"]) || (($user = find($_SESSION["login"]) === null))){
        header("Location: /index.php");
        exit;
    };
    if ($user["role"] !== "admin"){
        header("Location: /info_user.php");
        exit;
    }
};

function token_gen($login)
{
    $num = random_int(1,64);
    $token_hash = password_hash($login, PASSWORD_BCRYPT, $num);
    return $token_hash;
};

session_start();