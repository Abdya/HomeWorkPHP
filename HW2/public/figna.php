<?php
require "../includes/common.php";
$stage = new \Ino\Auth\Stage();
$stage->addSinger(new \Ino\Auth\Timatie());
$stage->addSinger(new \Ino\Auth\Petukh());
$stage->takeTheirBallsInYourHand();