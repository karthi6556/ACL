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
$user_id=$json->user_id;
$user_name=$json->user_name;
$user_desig=$json->user_desg; 
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $q=$conn->prepare("UPDATE `users` SET `user_name` = '$user_name',`user_designation` = '$user_desig' WHERE `user_id` = '$user_id'");
 $q->execute();
 echo"Updated Successfully.ID:<strong>".$user_id."<strong>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>