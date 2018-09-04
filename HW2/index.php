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
    if (empty($_POST['enter_login']) || empty($_POST['enter_pass'])){
        exit();
    }
    else{
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
    }


require "templates/honey.php";





























/*$login_bool=False;
$pass_bool=False;
$equality=False;
$index_equalityMAS=[];
for($i=0; $i<count($login); $i++){
   if ($enter_login==$login[$i]){
       $login_bool=True;
       array_push($index_equalityMAS, $i);
       }
}
for($i=0; $i<count($login); $i++){
   if ($enter_pass==$pass[$i]){
       $pass_bool=True;
       array_push($index_equalityMAS, $i);
   }
}
function equal()
{
   global $login_bool, $pass_bool;
   global $index_equalityMAS, $equality;
   global $name;
   if ($login_bool == $pass_bool && $index_equalityMAS[0]==$index_equalityMAS[1]) {
       $equality= True;
       echo "Hi, {$name[$index_equalityMAS[0]]}";
       #var_dump($index_equalityMAS);
   }
   else{
       echo "Try Again";
   }
}*/