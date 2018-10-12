<?php
require "../includes/common.php";
$id = $_SESSION["id"];
$token = $_SESSION["token"];
$user = \Ino\Core\Registry::getUserProvider()->getUserById($id);
if ($user->getToken() === $token && strtotime($user->getExpireDate()) >= time()) {
    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST);
    $gump->validation_rules(array(
        'pass' => 'required|max_len,15|min_len,3',
        'confirm_pass' => 'confirmation,pass',
    ));
    $gump->filter_rules(array(
        'login' => 'trim|sanitize_string|lower_case',
    ));
    $validated_data = $gump->run($_POST);
    if ($validated_data === false) {
        $errors = $gump->get_errors_array();
        $_SESSION["errors"] = $errors;
    }
    $user->setPasswordHash(hash_the_fucking_password($validated_data["pass"]));
    \Ino\Core\Registry::getUserProvider()->saveUser($user);
    header("Location: /index.php");
}
