<?php
require "../includes/common.php";
$gump = new GUMP();
$_POST = $gump->sanitize($_POST);
$gump->validation_rules(array(
    'email' => 'required|valid_email',
));
$gump->filter_rules(array(
    'email' => 'trim|sanitize_string',
));
$validated_data = $gump->run($_POST);
if ($validated_data === false){
    $error = $gump->get_errors_array();
    $_SESSION["error"] = $error;
    header("Location: /password_reset.php");
    exit;
}