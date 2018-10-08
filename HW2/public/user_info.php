<?php
require "../includes/common.php";
$user = \Ino\Core\Registry::getAuthenticationManager()->getAuthenticatedUser();
if ($user === null) {
    header('Location: /index.php');
    exit;
}
require "../templates/user_info.php";