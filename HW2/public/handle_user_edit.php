<?php
require "../includes/common.php";
$userId = $_GET["login"];
if (!\Ino\Core\Registry::getUserProvider()->isUserExists($userId)) {
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
    header("Location: /user_edit.php?login=$user");
    exit;
}

$user = \Ino\Core\Registry::getUserProvider()->getUserById($userId);

$user->setEmail($validated_data["email"]);
$user->setName($validated_data["name"]);
$user->setRole($_POST["role"]);
$user->setActive(!empty($_POST["active"]));
$user->setTimeEdit(gmdate("Y-m-d H:i:s"));

if (!empty($validated_data["pass"])) {
    $user->setPasswordHash(hash_the_fucking_password($validated_data["pass"]));
}

\Ino\Core\Registry::getUserProvider()->saveUser($user);

header("Location: /user_edit.php?login=$user");
