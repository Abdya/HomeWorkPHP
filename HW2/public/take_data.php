<?php
require "../includes/common.php";
$user = $_GET["login"];
if (!is_user_exists($user)){
    http_response_code(404);
    echo "User does not exists";
    exit;
}
$path = USERS_DIR . "/$user.json";

$gump = new GUMP();
$_POST = $gump->sanitize($_POST);
$gump->validation_rules(array(
    'email' => 'required|valid_email',
    'name' => 'required|alpha|valid_name',
    'pass' => 'max_len,20|min_len,3',
));
$gump->filter_rules(array(
    'email' => 'trim|sanitize_string',
    'name' => 'trim',
));

$validated_data = $gump->run($_POST);
if ($validated_data === false) {
    $errors = $gump->get_errors_array();
    $_SESSION["errors"] = $errors;
    header("Location: /edit_user.php?login=$user");
    exit;
}


$file = file_get_contents($path);
$temp = json_decode($file, true);


unset($file);
$new_user_data = [
    "email" => $validated_data["email"],
    "name" => $validated_data["name"],
    "role" => $_POST["role"],
    "active" => !empty($_POST["active"]),
    "time_edit" => gmdate("Y-m-d H:i:s"),
];
if (!empty($validated_data["pass"])) {
    $new_user_data["pass"] = hash_the_fucking_password($validated_data["pass"]);
}


$temp = array_merge($temp, $new_user_data);
file_put_contents($path, json_encode($temp));

header("Location: /edit_user.php?login=$user");
