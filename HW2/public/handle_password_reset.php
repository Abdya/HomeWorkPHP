<?php
require "../includes/common.php";
$gump = new GUMP();
$_POST = $gump->sanitize($_POST);
$gump->validation_rules(array(
    'login' => 'required|alpha_dash|max_len,15|min_len,3',
));
$gump->filter_rules(array(
    'login' => 'trim|sanitize_string|lower_case',
));
$validated_data = $gump->run($_POST);
if ($validated_data === false) {
    $error = $gump->get_errors_array();
    $_SESSION["error"] = $error;
    header("Location: /password_reset.php");
    exit;
}
$tokenGenerator = new \Ino\Auth\TokenGenerator();

$user = \Ino\Core\Registry::getUserProvider()->getUserByLogin($validated_data["login"]);
if ($user !== null) {
    $message = $tokenGenerator->generateToken($validated_data["login"]);

    $user->setToken($message);
    $user->setExpireDate(time() + 3600);
    \Ino\Core\Registry::getUserProvider()->saveUser($user);

    mail($user->getEmail(), 'Password Reset',"http://hw4.local/new_password.php?id={$user->getId()}&token=$message");
}

$_SESSION["password_reset"] = true;

header("Location: /password_reset.php");
