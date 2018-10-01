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
$message = token_gen($validated_data["login"]);
$new_data = [
    "token" => $message,
    "expire_date" => time() + 3600,
];
$login = find($validated_data["login"]);
update_user_data($validated_data["login"],$new_data);
mail($login["email"], 'Password Reset',"http://hw4.local/new_password.php?login={$validated_data["login"]}&token=$message");
$_SESSION["password_reset"] = true;

header("Location: /password_reset.php");
