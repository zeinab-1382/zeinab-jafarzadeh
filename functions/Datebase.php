<?php  

global $conn;

$servername="github.io";
$username="zeinab-jafarzadeh";
$password="";

try {
    $options=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION , PDO ::ATTR_DEFAULT_FETCH_MODE => PDO :: FETCH_OBJ];
    $conn = new PDO("mysql:host=$servername;dbname=pinkshopdb",$username,$password,$options); 

    return $conn;
    // echo"new record created successfully";
} catch (PDOException $e) {
    echo "connection failed" . $e ->getMessage();
}


