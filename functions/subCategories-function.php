<?php 



//this function creates new subset category.
function createSubCategory($title , $category_id){
    $sql="INSERT INTO subCategories SET  title=? , category_id=? , created_at=now()";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([ $title , $category_id]);

}



//this function is for getting all of subset categories that  registered in sites 
function getAllSubCategories(){
    $sql = "SELECT * FROM subCategories";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(); 
    return $result;
}

//this function give information of subset category by id
function getSubCategoriesById($id){
    $sql = "SELECT * FROM subCategories WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(); 
    return $result;
}


//this function updates information of subset categories
function updateSubCategories($id ,$title , $category_id){
    $sql = "UPDATE subCategories SET title=?, category_id=? , updated_at=now() WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id , $title , $category_id]);
     
   
}



//this function deletes user by user's id
function deleteSubCategoriesById($id){
    $sql = "DELETE FROM subCategories WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]); 
  
}


