<?php
// require "../../functions/helper.php";
require_once "../../functions/Datebase.php";
require_once "../../functions/categories-function.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    deleteCategoriesById($id);
    header('Location:https://zeinab-jafarzadeh.github.io/management-panel/categories/index1Categories.php');
}


