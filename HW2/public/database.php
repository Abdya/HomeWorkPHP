<?php
require "../includes/common.php";

$tmp = \Ino\Core\Registry::getDbUserProvider()->getUserById(1);
var_dump($tmp);