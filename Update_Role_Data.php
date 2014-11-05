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
$role_id=$json->role_id;
$role_name=$json->role_name;
$role_purpose=$json->role_purpose; 
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $q=$conn->prepare("UPDATE `roles` SET `role_id` = '$role_id',`role_name` = '$role_name',`role_purpose` = '$role_purpose' WHERE `role_id` = '$role_id'");
 $q->execute();
 echo"Updated Successfully.Role-ID:<strong>".$role_id."<strong>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>