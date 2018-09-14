<?php
require "common.php";
require "config.php";

function create()
{
    if (empty($_POST['enter_login']) || empty($_POST['enter_pass'])) {
        return;
    }
    $enter_login = $_POST['enter_login'];
    $enter_pass = hash_the_fucking_password($_POST['enter_pass']);
    $enter_email = $_POST['enter_email'];
    $enter_name = $_POST['enter_name'];
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
    );
    $complete_form = json_encode($form);
    #$filename = "$enter_name.json";
    #$handle = fopen("$filename", 'w+');
    $target_filename = dirname(__FILE__) . "";
    $handle = fopen(USERS_DIR."/$enter_name.json", "w+");
    fwrite($handle, $complete_form);
    fclose($handle);
    ?>
    <div class="alert alert-primary" role="alert">
        Well done man
    </div>
    <?php
}

require "sign_up.php";