<?php
$login=["qwer","wert","rtyu","ghjk"];
$pass=["xchj","jhkk","jkhk","jhkl"];
$name=["abdul","mahmul","evgen","tifon"];

$enter_login=$_POST['enter_login'];
$enter_pass=$_POST['enter_pass'];
$login_bool=False;
$pass_bool=False;
$index_equality=False;
for($i=0; $i<count($login); $i++){
    if ($enter_login==$login[$i]){
        $login_bool=True;
        }
}
for($i=0; $i<count($login); $i++){
    if ($enter_pass==$pass[$i]){
        $pass_bool=True;
    }
}
if ()
 require "form.php";