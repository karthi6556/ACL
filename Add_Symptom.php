<?php
//Headers for Declaring Json_decode
header("Access-Control-Allow-Origin: *");
header("Content-Type:text/plain");
//Includes Database Configuration
include'dbConnect.php';
$db="prism";
//Get Posted data
$data=file_get_contents("php://input");
//Decodes Posted Objects into Associative Array
$json=json_decode($data);
$id=$json->id;
$category=$json->category;
$sub_category=$json->sub_category;
$symptom_name=$json->symptom_name; 
$display_sequence=$json->display_sequence;
try{
 $conn=new PDO("mysql:dbname=$db;host=$host","$username","$password");
 $q=$conn->prepare("INSERT INTO `symptom`(`category`,`sub_category`,`symptom_name`,`display_sequence`)VALUES('$category','$sub_category','$symptom_name','$display_sequence'");
 $q->execute();
 echo"Updated Successfully.ID:<strong>".$id."<strong>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>