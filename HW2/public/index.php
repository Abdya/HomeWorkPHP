<?php
require dirname(dirname(__FILE__)) . "/includes/common.php";
$error = null;
if (!empty($_SESSION["login"])){
    header("Location: /info_user.php");
    die;
}
if (!empty($_POST['enter_login']) || !empty($_POST['enter_password'])) {
    $enter_login = $_POST['enter_login'];
    $enter_password = $_POST['enter_password'];
    $user = find($enter_login);

    if ($user === null || !verify_the_fucking_password($enter_password, $user["password"])) {
        $error = 'GO OUT OF HERE FUCKING JABA!';
    }
    else {
        if ($user["active"] === false) {
            $error = 'YOU SHALL NOT PASS!!!!111!1!!!';
        }else {
            $_SESSION["login"] = $enter_login;
            login_time($_SESSION["login"]);

            if (!empty($_POST["remember"])){
                $tmp_token = token_gen($_SESSION["login"]);
                $token_base64 = base64_encode($tmp_token);
                if (!file_exists(TOKEN_DIR . "/{$_SESSION["login"]}")){
                    $path = TOKEN_DIR . "/{$_SESSION["login"]}";
                    mkdir($path);
                    $handle = fopen($path . "/$token_base64.json", "w+");
                    fwrite($handle, time());
                    fclose($handle);
                }

                // todo: redirect to index.php if all bad
                setcookie("user_token", base64_encode($_SESSION["login"] . ":" . $tmp_token), time() + 3600*24*7);
            }

            if ($user["role"] === "admin"){
                header("Location: /hello_adm.php");
            }else{
                header("Location: /info_user.php");
            }
            exit;
        }

    }
}

require "honey.php";
