<?php
require "config.php";
require "../vendor/autoload.php";
require "../autoload.php";
GUMP::add_validator("user_exists", function ($field, $input, $param = null) {
    return !\Ino\Core\Registry::getUserProvider()->isUserExists(strtolower(trim($input[$field])));
}, "User is already exists!");

GUMP::add_validator("confirmation", function ($field, $input, $param = null) {
    return $input[$field] === $input[$param];
}, "Passwords must match!");



function parse()
{
    $user_list_tmp = [];
    foreach (glob(USERS_DIR . "/*.json") as $filename) {
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
function hash_the_fucking_password($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}
function verify_the_fucking_password($password, $password_hash)
{
    return password_verify($password, $password_hash);
}
function login_time($login)
{
    $path = USERS_DIR . "/$login.json";
    $file = file_get_contents($path);
    $temp = json_decode($file, true);
    $new_data = ["time_login" => gmdate("Y-m-d H:i:s")];
    $temp = array_merge($temp, $new_data);
    file_put_contents($path, json_encode($temp));
};
function check_admin()
{
    $user = \Ino\Core\Registry::getAuthenticationManager()->getAuthenticatedUser();
    if ($user === null) {
        header("Location: /index.php");
        exit;
    };
    if ($user->getRole() !== \Ino\Auth\User::ROLE_ADMIN) {
        header("Location: /info_user.php");
        exit;
    }
};

function token_gen($login)
{
    $num = random_int(1, 64);
    $token_hash = password_hash($login . $num, PASSWORD_BCRYPT);
    return $token_hash;
};
function login_by_remember_me_token()
{
    if (empty($_COOKIE["user_token"]) || !empty($_SESSION["login"])) {
        return;
    }
    $tmp = base64_decode($_COOKIE["user_token"]);
    list($login, $token) = explode(":", $tmp);
    $tmp_token = base64_encode($token);
    $tmp_path = TOKEN_DIR . "/$login";
    $path = TOKEN_DIR . "/$login" . "/$tmp_token.json";
    if (!(file_exists($path))) {
        setcookie("user_token", "", time() - 3600);
        return;
    }
    $_SESSION["login"] = $login;
};

function update_user_data($login, $new_data)
{
    $path = USERS_DIR . "/$login.json";
    $user_data = find($login);
    $user_data = array_merge($user_data, $new_data);
    file_put_contents($path, json_encode($user_data));
}
session_start();
login_by_remember_me_token();
