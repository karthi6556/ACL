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
//Select Features Table
$stmt4=$pdo->prepare("SELECT * FROM `role_features`");
$stmt4->execute();
$role_features = $stmt4->fetchAll();
//Select Features Table
$stmt5=$pdo->prepare("SELECT * FROM `role_users`");
$stmt5->execute();
$role_users = $stmt5->fetchAll();
//Storing Fetched Objects in array 
$store=array('users'=>$users,'roles'=>$roles,'features'=>$features,'role_features'=>$role_features,'role_users'=>$role_users);
//Encodes Associative Array into JSON Objects 
echo json_encode($store);
}
catch(PDOException $e){
 echo'Connection failed '.$e->getMessage();
}
?>


