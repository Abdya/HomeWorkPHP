<?php
function find($enter_login, $enter_pass)
{
    $filename = dirname(__FILE__) . "/users/$enter_login.json";

    if (file_exists($filename)){
        $tmp_login = file_get_contents("./users/$enter_login.json");
        $tmp_login = json_decode($tmp_login, true);

        if ($tmp_login['pass'] === $enter_pass){
            return $tmp_login;
        }
    }

    return null;
}

function printik()
{
    /*if (empty($_POST['enter_login']) || empty($_POST['enter_pass'])){

    }
    else{*/
        $enter_login = $_POST['enter_login'];
        $enter_pass = $_POST['enter_pass'];
        $user = find($enter_login, $enter_pass);

        if ($user === null){?>
            <div class="alert alert-danger" role="alert">
                Go out of here, jaba
            </div>
<?php
        }
        else{?>
            <div class="alert alert-success" role="alert">
                Well done boy <?php echo $user['name'] ?>
            </div>
<?php        }

    }


require "templates/honey.php";
