<?php
require "../includes/common.php";
$login = $_SESSION["login"];
check_admin();
$user = find($login);
require "../templates/admin_start_page.php";