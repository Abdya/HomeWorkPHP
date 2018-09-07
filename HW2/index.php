<?php
function find($enter_login, $enter_password)
{
    $filename = dirname(__FILE__) . "/users/$enter_login.json";

    if (file_exists($filename)){
        $tmp_login = file_get_contents("./users/$enter_login.json");
        $tmp_login = json_decode($tmp_login, true);

        if (password_verify($enter_password, $tmp_login['password'])){
            return $tmp_login;
        }
    }

    return null;
}

function printik()
{
    if (empty($_POST['enter_login']) || empty($_POST['enter_password'])) {
        return;
    }
    $enter_login = $_POST['enter_login'];
    $enter_password = $_POST['enter_password'];
    $user = find($enter_login, $enter_password);

    if ($user === null) {
        ?>
        <div class="alert alert-danger" role="alert">
            Go out of here, jaba
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-success" role="alert">
            Well done boy <?php echo $user['name'] ?>
        </div>
    <?php }
}

require "templates/honey.php";
