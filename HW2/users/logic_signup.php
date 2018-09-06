<?php
function create()
{
    $enter_login = $_POST['enter_login'];
    $enter_pass = $_POST['enter_pass'];
    $enter_email = $_POST['enter_email'];
    $enter_name = $_POST['enter_name'];
    $form=[$enter_login, $enter_pass, $enter_email, $enter_name];
    $complete_form = json_encode($form);
    #$filename = "$enter_name.json";
    #$handle = fopen("$filename", 'w+');
    $handle = fopen("/$enter_name.json", "w+");
    fwrite($handle, $complete_form);
    fclose($handle);
    ?>
    <div class="alert alert-primary" role="alert">
        A simple primary alert—check it out!
    </div>
    <?php
    #var_dump("$enter_name.json");
}
require "sign_up.php";