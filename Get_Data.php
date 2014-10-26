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
//Select User Table
$stmt1=$pdo->prepare("SELECT * FROM `users`");
$stmt1->execute();
$users = $stmt1->fetchAll();
//Select Roles Table
$stmt2=$pdo->prepare("SELECT * FROM `roles`");
$stmt2->execute();
$roles = $stmt2->fetchAll();
//Select Features Table
$stmt3=$pdo->prepare("SELECT * FROM `features`");
$stmt3->execute();
$features = $stmt3->fetchAll();
//Storing Fetched Objects in array 
$store=array('users'=>$users,'roles'=>$roles,'features'=>$features);
//Encodes Associative Array into JSON Objects 
echo json_encode($store);
}
catch(PDOException $e){
 echo'Connection failed '.$e->getMessage();
}
?> 