<?php
$login=["qwer","wert","rtyu","ghjk"];
$pass=["xchj","jhkk","jkhk","jhkl"];
$name=["abdul","mahmul","evgen","tifon"];

$enter_login=$_POST['enter_login'];
$enter_pass=$_POST['enter_pass'];
$login_bool=False;
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
}
 require "form.php";