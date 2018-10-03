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
        $validated_data["pass"] = hash_the_fucking_password($validated_data["pass"]);
        $form = array(
            "login" => $validated_data["login"],
            "pass" => $validated_data["pass"],
            "email" => $validated_data["email"],
            "name" => $validated_data["name"],
            "role" => ROLE_USER,
            "active" => true,
            "time_reg" => gmdate("Y-m-d H:i:s")
        );
        $complete_form = json_encode($form);
        $handle = fopen(USERS_DIR . "/{$validated_data["login"]}.json", "w+");
        fwrite($handle, $complete_form);
        fclose($handle);
    }
}

require "../templates/sign_up.php";