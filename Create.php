<?php
//Includes Localhost Configuration
include'dbConnect.php';
//Error Handling
try{
//PDO(PHP Data Object) Database Connectivity Initialized
$pdo=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
//User Table Creation
$user_creation=$pdo->prepare("CREATE TABLE IF NOT EXISTS `users`(`id` INT(10) NOT NULL AUTO_INCREMENT,`user_id` VARCHAR(15),`user_name` VARCHAR(50),`user_designation` VARCHAR(30),`user_department` VARCHAR(30),`user_joined` DATE,PRIMARY KEY(id))");
$user_creation->execute();
echo'Users Table Created Successfully<br>';
//Roles Table Creation
$role_creation=$pdo->prepare("CREATE TABLE IF NOT EXISTS `roles`(`id` INT(10) NOT NULL AUTO_INCREMENT,`role_id` VARCHAR(15),`role_name` VARCHAR(30),`role_purpose` VARCHAR(50),PRIMARY KEY(id))");
$role_creation->execute();
echo'Roles Table Created Successfully<br>';
//Features Table Creation
$feature_creation=$pdo->prepare("CREATE TABLE IF NOT EXISTS `features`(`id` INT(10) NOT NULL AUTO_INCREMENT,`features_id` VARCHAR(15),`features_name` VARCHAR(30),`features_descr` VARCHAR(50),`features_perm` VARCHAR(1),PRIMARY KEY(id))");
$feature_creation->execute();
echo'Features Table Created Successfully<br>';
//Role Features Table Creation
$role_feature=$pdo->prepare("CREATE TABLE IF NOT EXISTS `role_features`(`id` INT(10) NOT NULL AUTO_INCREMENT,`role_id` VARCHAR(15),`features_id` VARCHAR(15) NOT NULL,PRIMARY KEY(id))");
$role_feature->execute();
echo'Features Table Created Successfully<br>';
//Role Users Table Creation
$role_users=$pdo->prepare("CREATE TABLE IF NOT EXISTS `role_users`(`id` INT(10) NOT NULL AUTO_INCREMENT,`role_id` VARCHAR(15),`user_id` VARCHAR(15) NOT NULL,PRIMARY KEY(id))");
$role_users->execute();
echo'Role Users Table Created Successfully<br>';
}
catch(PDOException $e){
 echo'Connection failed '.$e->getMessage();
}
?> 