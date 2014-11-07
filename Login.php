<?php
//Headers for Declaring Json_encode
header("Access-Control-Allow-Origin: *");
header("Content-Type:text/plain");
//Includes Database Configuration
include'dbConnect.php';
//Exception  
try{
//Connect Establish
$pdo=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
//Select ROLE USERS Table
$stmt1=$pdo->prepare("SELECT * FROM `role_users`");
$stmt1->execute();
$role_users = $stmt1->fetchAll();
//Select FEATURES Table
$stmt2=$pdo->prepare("SELECT * FROM `features` LIMIT 50");
$stmt2->execute();
$features = $stmt2->fetchAll();
//Select FEATURES 25 LIMIT Table
$stmt3=$pdo->prepare("SELECT * FROM `features` LIMIT 25");
$stmt3->execute();
$features_y = $stmt3->fetchAll();
//Select FEATURES 10 LIMIT Table
$stmt4=$pdo->prepare("SELECT * FROM `features` LIMIT 10");
$stmt4->execute();
$features_n = $stmt4->fetchAll();
//Storing Fetched Objects in array 
$store=array('role_users'=>$role_users,'features'=>$features,'features_y'=>$features_y,'features_n'=>$features_n);
//Encodes Associative Array into JSON Objects 
echo json_encode($store);
}
catch(PDOException $e){
 echo'Connection failed '.$e->getMessage();
}
?> 