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
$features_id=$json->features_id;
//Exception Handling
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $stmt=$conn->prepare("INSERT INTO `role_features`(`role_id`,`features_id`)VALUES('$role_id','$features_id')");
  $stmt->execute();
  echo"Feature & Roles Data Inserted Successfully<br>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>