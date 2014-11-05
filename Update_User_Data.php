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
$user_name=$json->user_name;
$user_desig=$json->user_desg;
$user_dept=$json->user_dept; 
$user_joined=$json->user_joined;
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $q=$conn->prepare("UPDATE `users` SET `user_name` = '$user_name',`user_designation` = '$user_desig',`user_department` = '$user_dept',`user_joined` = '$user_joined' WHERE `user_name` = '$user_name'");
 $q->execute();
 echo"Updated Successfully.User-Name:<strong>".$user_name."<strong>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>