<?php
require "../includes/common.php";

function create()
{
    if (empty($_POST)) {
        return [];
    }
    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST);
    $gump->validation_rules(array(
        'login' => 'required|alpha_dash|max_len,15|min_len,3|user_exists',
        'pass' => 'required|max_len,20|min_len,3',
        'email' => 'required|valid_email',
        'name' => 'required|alpha|valid_name'
    ));
    $gump->filter_rules(array(
        'login' => 'trim|sanitize_string|lower_case',
        'email' => 'trim|sanitize_string',
        'name' => 'trim',
    ));

    $validated_data = $gump->run($_POST);
    if ($validated_data === false) {
        $errors = $gump->get_errors_array();
        return $errors;
    } else {
        $user = new \Ino\Auth\User($validated_data["login"], $validated_data["email"], $validated_data["name"]);
        $user->setPasswordHash(hash_the_fucking_password($validated_data["pass"]));
        $user->setRole(\Ino\Auth\User::ROLE_USER);
        $user->setActive(true);
        $user->setTimeReg(gmdate("Y-m-d H:i:s"));
        \Ino\Core\Registry::getUserProvider()->saveUser($user);
    }
    return [];
}

require "../templates/sign_up.php";