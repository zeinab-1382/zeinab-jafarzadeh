<?php 



//this function creates new user.
function createUser($firstName , $lastName, $phoneNumber, $email , $password , $image){
        
    $hashed_password = password_hash($password , PASSWORD_DEFAULT);
    $sql="INSERT INTO users SET firstname=? , lastname=? , telephone=? , email=? , password=? , image=? , created_at=now()";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$firstName, $lastName, $phoneNumber,$email,$hashed_password,$image]);
}

//this function checks that entrance email is repititive or not.
function checkUser($email){
    $sql = "SELECT * FROM users WHERE email=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $result = $stmt->fetch(); 
    return $result;
}

//this function checks the length of entrance password
function checkPasswordLength($password){
    if(strlen($password)<6){
        return false;
    }else{
        return true;
    }
}

//this function is for saving the image of user uploads
function uploadImage($image , $table){
    $name = time().$image['name'];
    move_uploaded_file($image['tmp_name'],__DIR__.'./images/'.$name);
    return $name;
}

//this function is for getting all of users that  registered in sites 
function getAllUsers(){
    $sql = "SELECT * FROM users";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(); 
    return $result;
}

//this function give information of user by id
function getUserById($id){
    $sql = "SELECT * FROM users WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(); 
    return $result;
}


//this function updates information of user
function updateUser($id , $firstName , $lastName, $phoneNumber,  $password , $image){
    $user=getUserById($id);
    if(!empty($password)){
        $password = password_hash($password , PASSWORD_DEFAULT);
    }else{
        $password = $user->password;
    }
    if(isset($image) && !empty($image['name'])){
       uploadImage($image , 'users-image');
       $image = $image['name'];
    }else{
        $image = $user->image;
    }
    $sql = "UPDATE users SET firstname=?,lastname=?,telephone=?,password=?,image=?,updated_at=now() WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$firstName , $lastName , $phoneNumber , $password , $image ,$id]);
    // $result = $stmt->fetch();
   
}



//this function deletes user by user's id
function deleteUserById($id){
    $sql = "DELETE FROM users WHERE id=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]); 
  
}

//this function delete user in myAccount page
// function deleteUser($firstName , $lastName, $phoneNumber, $email , $password , $image){
//     $sql = "DELETE FROM users firstname=?,lastname=?,telephone=?,password=?,image=?";
//     global $conn;
//     $stmt = $conn->prepare($sql);
//     $stmt->execute([$firstName , $lastName, $phoneNumber, $email , $password , $image]); 
  
// }


//this function update firstname , lastname , homeaddress , postcode. this function is for myAccount page
function updateInfoUser($firstName,$lastName, $homeaddress , $postcode){
    // getUserByEmail($email);
    $sql = "UPDATE users SET firstname=? , lastname=? , homeaddress=? , postcode=? , updated_at=now()";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$firstName,$lastName, $homeaddress , $postcode]);
    // $result = $stmt->fetch();
}

//this function update just phone number and password in myAvvount page
function updateInfoUserr($phoneNumber,  $password){
    // getUserByEmail($email);
    $sql = "UPDATE users SET telephone=? , password=? , updated_at=now()";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$phoneNumber,  $password]);
    // $result = $stmt->fetch();
}


//this function is for getting a user by email
// function getUserByEmail($email){
//     $sql = "SELECT * FROM users WHERE email=?";
//     global $conn;
//     $stmt = $conn->prepare($sql);
//     $stmt->execute([$email]);
//     $result = $stmt->fetch(); 
//     return $result;
// }

