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
    foreach (glob(USERS_DIR."/*.json") as $filename)
    {
        $user = dirname(__FILE__) . $filename;
    }
}
