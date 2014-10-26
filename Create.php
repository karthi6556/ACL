<?php
//Includes Localhost Configuration
include'dbConnect.php';
//Error Handling
try{
//PDO(PHP Data Object) Database Connectivity Initialized
$pdo=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
//User Table Creation
$user_creation=$pdo->prepare("CREATE TABLE IF NOT EXISTS `users`(`user_id` VARCHAR(15) NOT NULL,`user_name` VARCHAR(50),`user_designation` VARCHAR(30),`user_department` VARCHAR(30),`user_joined` VARCHAR(15),PRIMARY KEY(`user_id`))");
$user_creation->execute();
echo'Users Table Created Successfully<br>';
//Roles Table Creation
$role_creation=$pdo->prepare("CREATE TABLE IF NOT EXISTS `roles`(`role_id` VARCHAR(15) NOT NULL,`role_name` VARCHAR(30),`role_purpose` VARCHAR(50),PRIMARY KEY(`role_id`))");
$role_creation->execute();
echo'Roles Table Created Successfully<br>';
//Features Table Creation
$feature_creation=$pdo->prepare("CREATE TABLE IF NOT EXISTS `features`(`features_id` VARCHAR(15) NOT NULL,`features_name` VARCHAR(30),`features_descr` VARCHAR(30),`features_perm` VARCHAR(5),PRIMARY KEY(`features_id`))");
$feature_creation->execute();
echo'Features Table Created Successfully<br>';
//Role Features Table Creation
$role_feature=$pdo->prepare("CREATE TABLE IF NOT EXISTS `role_features`(`role_id` VARCHAR(15) NOT NULL,`features_id` VARCHAR(15) NOT NULL)");
$role_feature->execute();
echo'Features Table Created Successfully<br>';
//Role Users Table Creation
$role_users=$pdo->prepare("CREATE TABLE IF NOT EXISTS `role_users`(`role_id` VARCHAR(15) NOT NULL,`user_id` VARCHAR(15) NOT NULL)");
$role_users->execute();
echo'Role Users Table Created Successfully<br>';
}
catch(PDOException $e){
 echo'Connection failed '.$e->getMessage();
}
?> 