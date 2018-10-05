<?php
require "../includes/common.php";
check_admin();
$user = \Ino\Core\Registry::getAuthenticationManager()->getAuthenticatedUser();
require "../templates/admin_start_page.php";