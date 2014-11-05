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
$features_name=$json->features_name;
$features_descr=$json->features_descr;
$features_perm=$json->features_perm; 
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $q=$conn->prepare("UPDATE `features` SET `features_name` = '$features_name',`features_descr` = '$features_descr',`features_perm` = '$features_perm' WHERE `features_name` = '$features_name'");
 $q->execute();
 echo"Updated Successfully.FeaturesName:<strong>".$features_name."<strong>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>