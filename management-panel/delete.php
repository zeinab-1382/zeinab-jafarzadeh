<?php
//this file is for deleting a user.

// require ".././functions/helper.php";
require_once "../functions/Datebase.php";
require_once ".././functions/users-function.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    deleteUserById($id);
    header('Location:https://zeinab-jafarzadeh.github.io/management-panel/index1.php');
}


