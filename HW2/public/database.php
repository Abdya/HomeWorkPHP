<?php
require "../includes/common.php";

$tmp = new \Ino\Auth\User("num", "wepkieop@jfjan.pid", "KOLOL_KROKODIL");
$tmp->setPasswordHash("hagfiagfkasejf");
$tmp->setRole(\Ino\Auth\User::ROLE_USER);
$tmp->setActive(true);
\Ino\Core\Registry::getDbUserProvider()->saveUser($tmp);
var_dump($tmp);