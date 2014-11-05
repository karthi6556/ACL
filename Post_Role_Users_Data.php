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
//Assigning values for Roles Table
$role_id=$json->role_id;
$user_name=$json->user_name;
//Exception Handling
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $stmt=$conn->prepare("INSERT INTO `role_users`(`role_id`,`user_name`)VALUES('$role_id','$user_name')");
  $stmt->execute();
  echo"Role_ID & User_ID Inserted Successfully<br>";
  echo"<strong>Role_ID -".$role_id."& User_Name -".$user_name."</strong>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>