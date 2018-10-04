<?php
require dirname(dirname(__FILE__)) . "/includes/common.php";
$error = null;
if (!empty($_SESSION["login"])) {
    $user = \Ino\Core\Registry::getUserProvider()->getUserById($_SESSION["login"]);
    if ($user->getRole() === ROLE_ADMIN) {
        header("Location: /user_list.php");
    } else {
        header("Location: /user_info.php");
    }
    exit;
}
if (!empty($_POST['enter_login']) || !empty($_POST['enter_password'])) {
    $enter_login = $_POST['enter_login'];
    $enter_password = $_POST['enter_password'];
    $user = \Ino\Core\Registry::getUserProvider()->getUserById($enter_login);

    if ($user === null || !$user->isMatchingPassword($enter_password)) {
        $error = 'GO OUT OF HERE FUCKING JABA!';
    } else {
        if (!$user->isActive()) {
            $error = 'YOU SHALL NOT PASS!!!!111!1!!!';
        } else {
            $_SESSION["login"] = $enter_login;
            $user->updateLoginTime();
            \Ino\Core\Registry::getUserProvider()->saveUser($user);

            if (!empty($_POST["remember"])) {
                $tmp_token = \Ino\Core\Registry::getUserTokenProvider()->generateToken($user->getId());

                setcookie("user_token", base64_encode($user->getId() . ":" . $tmp_token), time() + 3600 * 24 * 7);
            }

            if ($user->getRole() === "admin") {
                header("Location: /admin_start_page.php");
            } else {
                header("Location: /user_info.php");
            }
            exit;
        }

    }
}

require "../templates/login.php";
