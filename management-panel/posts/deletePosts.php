<?php
require "../../functions/helper.php";
require_once "../../functions/Datebase.php";
require_once "../../functions/posts-function.php";
// require_once "../../functions/categories-function.php";
// require_once "../../functions/users-function.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    deletePostById($id);
    header('Location:https://zeinab-jafarzadeh.github.io/management-panel/posts/index1Posts.php');
}

