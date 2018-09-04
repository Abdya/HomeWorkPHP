<?php

$enter_login=$_POST['enter_login'];
$enter_pass=$_POST['enter_pass'];
$equal=False;

function find($enter_login, $enter_pass)
{
    $filename = "/users/$enter_login.json";
    if (file_exists($filename)) {
        $tmp_login = file_get_contents("./users/$enter_login.json");
        $tmp_login = json_decode($tmp_login,true);
        if ($tmp_login['pass'] === $enter_pass){
            return $tmp_login;
        }
    }
    return null;
}
 require "form.php";





























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