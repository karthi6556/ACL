<?php
//Includes Localhost Configuration
include'dbConnect.php';
//Error Handling
try{
//PDO(PHP Data Object) Database Connectivity Initialized
$pdo=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
//App Configuration Table Creation
$app_config=$pdo->prepare("CREATE TABLE IF NOT EXISTS `App_Config`(`Config_ID` INT(2) NOT NULL AUTO_INCREMENT,`Config_Type` VARCHAR(50),`Config_Code` VARCHAR(100),`Config_Desc` VARCHAR(255),PRIMARY KEY(Config_ID))");
$app_config->execute();
echo'App Configuration Table Created Successfully<br>';
}
catch(PDOException $e){
 echo'Connection failed '.$e->getMessage();
}
?> 