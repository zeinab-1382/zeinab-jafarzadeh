<?php 
require ".././functions/helper.php";


session_start();
session_destroy();
header('Location:https://zeinab-jafarzadeh.github.io/login.php');
exit;

