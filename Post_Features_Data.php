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
//Assigning values for Features Table
$features_name=$json->features_name;
$features_descr=$json->features_descr;
$features_perm=$json->features_perm;
//Exception Handling
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $stmt=$conn->prepare("INSERT INTO `features`(`features_name`,`features_descr`,`features_perm`)VALUES('$features_name','$features_descr','$features_perm')");
  $stmt->execute();
  echo"Features Data Inserted Successfully.<br><strong>".$features_name."</strong>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>