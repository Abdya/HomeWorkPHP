<?php
define("USERS_DIR", dirname(dirname(__FILE__))."/users");
define("ROLE_USER", "user");
define("ROLE_ADMIN", "admin");
define("TOKEN_DIR", dirname(dirname(__FILE__))."/user_tokens");

error_reporting(E_ALL);
ini_set('display_errors', 1);