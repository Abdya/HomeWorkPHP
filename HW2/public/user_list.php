<?php
require "../includes/common.php";
check_admin();
$userList = \Ino\Core\Registry::getUserProvider()->getAllUsers();
require "../templates/user_list.php";