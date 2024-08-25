<?php 



//this function creates new user.
function createCategory($title){
    $sql="INSERT INTO categoties SET  title=? , created_at=now()";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title]);
}



//this function is for saving the image of user uploads
// function uploadImage($image){
//     move_uploaded_file($image['tmp_name'],__DIR__.'./images/'.$image['name']);
//     return $image['name'];
// }

//this function is for getting all of users that  registered in sites 
function getAllCategories(){
    $sql = "SELECT * FROM categoties";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(); 
    return $result;
}

//this function give information of user by id
function getCategoryById($id){
    $sql = "SELECT * FROM categoties WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(); 
    return $result;
}


//this function updates information of user
function updateCategories($id ,$title){
    $sql = "UPDATE categoties SET title=?,updated_at=now() WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title,$id]);
     
   
}



//this function deletes user by user's id
function deleteCategoriesById($id){
    $sql = "DELETE FROM categoties WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]); 
  
}


