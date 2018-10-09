<?php
require "database.php";
$link = db_connect();
$query = "SELECT * FROM login";
$result = mysqli_query($link, $query);