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
$role_name=$json->role_name;
$role_purpose=$json->role_purpose;
//Exception Handling
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $stmt=$conn->prepare("INSERT INTO `roles`(`role_id`,`role_name`,`role_purpose`)VALUES('$role_id','$role_name','$role_purpose')");
  $stmt->execute();
  echo"Roles Data Inserted Successfully.<br>Role-ID:<strong>".$role_id."</srtong>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>