<?php
require "../includes/common.php";
if (!empty($_SESSION["error"])) {
    $error = $_SESSION["error"];
    unset($_SESSION["error"]);
}
require "../templates/password_reset.php";