<?php
//Headers for Declaring Json_decode
header("Access-Control-Allow-Origin: *");
header("Content-Type:text/plain");
//Includes Database Configuration
include'dbConnect.php';
//Get Posted data
$data=file_get_contents("php://input");
//Decodes Posted Objects into Associative Array
$json=json_decode($data);
//Assigning values for Users Table
$user_name=$json->user_name;
$user_designation=$json->user_designation;
$user_department=$json->user_department;
$user_joined=$json->user_joined;
//Exception Handling
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $stmt=$conn->prepare("INSERT INTO `users`(`user_name`,`user_designation`,`user_department`,`user_joined`)VALUES('$user_name','$user_designation','$user_department','$user_joined')");
  $stmt->execute();
  echo"User Registered Successfully.<br>User-Name:<strong>".$user_name."</srtong>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>