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
if ($validated_data === false){
    $error = $gump->get_errors_array();
    $_SESSION["error"] = $error;
    header("Location: /password_reset.php");
    exit;
}
$login = find($validated_data["login"]);
$path = USERS_DIR . "/{$validated_data["$login"]}.json";
$message = token_gen($login);
$new_data = ["token" => $message];
push_encode($login,$new_data,$path);
mail($login["email"], 'Password Reset',"http://hw4.local/new_password_logic.php?login=$login&token=$message");
$_SESSION["password_reset"] = true;

header("Location: /password_reset.php");