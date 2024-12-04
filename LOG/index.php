<?php
require 'main.php';
$m->saveHit();
header("location: auth/login.php");
?>