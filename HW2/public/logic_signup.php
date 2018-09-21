<?php
require "../includes/common.php";

function create()
{
    if (empty($_POST['enter_login']) || empty($_POST['enter_pass'])) {
        return;
    }
    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST);
    $gump->validation_rules(array(
        'enter_login' => 'required|alpha_dash|max_len,15|min_len,3',
        'enter_pass' => 'required|max_len,20|min_len,3',
        'enter_email' => 'required|valid_email',
        'enter_name' => 'required|alpha|valid_name'
    ));
    $gump->filter_rules(array(
        'enter_login' => 'trim|sanitize_string|lower_case',
        'enter_pass' => 'trim',
        'enter_email' => 'trim|sanitize_string',
        'enter_name' => 'trim',
    ));

    $validated_data = $gump ->run($_POST);
    if ($validated_data === false){
        echo $gump->get_readable_errors(true);
    } else {} };
    //todo make logic more humanly
        /*$validated_data["enter_pass"] = hash_the_fucking_password($validated_data["enter_pass"]);
        if (is_user_exists($enter_login)){?>
            <div class="alert alert-danger" role="alert">
                Try another login
            </div>
            <?php return;
        }
        $form = array(
            "login" => $enter_login,
            "password" => $enter_pass,
            "email" => $enter_email,
            "name" => $enter_name,
            "role" => ROLE_USER,
            "active" => true,
            "time_reg" => gmdate("Y-m-d H:i:s")
        );
        $complete_form = json_encode($form);
        $handle = fopen(USERS_DIR."/$enter_login.json", "w+");
        fwrite($handle, $complete_form);
        fclose($handle);


}

require "sign_up.php";