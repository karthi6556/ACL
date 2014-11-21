<?php
//Headers for Declaring Json_encode
header("Access-Control-Allow-Origin: *");
header("Content-Type:text/plain");
//Includes Database Configuration
include'dbConnect.php';
$db="prism";
//Exception  
try{
//Connect Establish
$pdo=new PDO("mysql:dbname=$db;host=$host","$username","$password");
//Select User Table
$stmt1=$pdo->prepare("SELECT * FROM `symptom`");
$stmt1->execute();
$symptom = $stmt1->fetchAll();
//Storing Fetched Objects in array 
$store=array('symptom'=>$symptom);
//Encodes Associative Array into JSON Objects 
echo json_encode($store);
}
catch(PDOException $e){
 echo'Connection failed '.$e->getMessage();
}
?>


