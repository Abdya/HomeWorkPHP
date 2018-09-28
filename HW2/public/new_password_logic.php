<?php
require "../includes/common.php";
$login = $_SESSION["login"];
$token = $_SESSION["token"];
$user_data = find($login);
if ($user_data["token"] === $token && $user_data["expire_date"] >= time()) {
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
    $new_pass = [
        "pass" => hash_the_fucking_password($validated_data["confirm_pass"]),
    ];
    update_user_data($login, $new_pass);
    header("Location: /new_password.php");
}
