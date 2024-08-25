<?php 



//this function creates new post.
function createPosts($title , $body,$price , $size , $color , $inventory , $status, $image, $user_id, $category_id , $subcategory_id ){
    $new_image = uploadImage1($image ,'posts-image');
    $sql="INSERT INTO posts SET title=? , body=? , price=?  , size=? , color=? , inventory=? , status=? , image=? , user_id=? , category_id=? , subcategory_id=? , created_at=now()";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title , $body , $price , $size , $color , $inventory , $status , $new_image , $user_id, $category_id , $subcategory_id]);
}



//this function is for saving the image of post uploads
function uploadImage1($image , $table){
    $name = time().$image['name'];
    move_uploaded_file($image['tmp_name'],__DIR__."./images/$table/".$name);
    return $name;
}

//this function is for getting all of posts that  registered in sites 
function getAllPosts(){
    $sql = "SELECT * FROM posts";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(); 
    return $result;
}

//this function give information of post by id
function getPostById($id){
    $sql = "SELECT * FROM posts WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(); 
    return $result;
}


//this function updates information of post
function updatePost($id , $title , $body , $price , $size , $color, $inventory ,$status,$category_id, $subcategory_id, $image){
    $post=getPostById($id);
    if(isset($image) && !empty($image['name'])){
        uploadImage1($image , 'posts-image' );
        $image = $image['name'];
    }else{
        $image= $post->image;
    }
    $sql = "UPDATE posts SET title=? , body=? , price=? , size=? , color=? , inventory=? , status=? , category_id=? , subcategory_id=? , updated_at=now() , image=? WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id , $title , $body , $price , $size , $color , $inventory , $status , $category_id , $subcategory_id, $image]);
    // $result = $stmt->fetch();
   
}



//this function deletes user by post's id
function deletePostById($id){
    $sql = "DELETE FROM posts WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]); 
  
}


//this function translate status to persion
function status($status){
   $fa_status="";
   switch($status){
        case "draft":
            $fa_status="پیش نویس";
            break;
        case "published": 
            $fa_status="منتشر شده";
            break;
        case "archived": 
            $fa_status="بایگانی";
            break;
    }

    return $fa_status;
}




