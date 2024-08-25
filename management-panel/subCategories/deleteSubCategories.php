<?php
// require "../../functions/helper.php";
require_once "../../functions/Datebase.php";
require_once "../../functions/subCategories-function.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    deleteSubCategoriesById($id);
    header('Location:https://zeinab-jafarzadeh.github.io/management-panel/subCategories/index1SubCategories.php');
}
