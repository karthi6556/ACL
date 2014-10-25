<?php
$host="localhost";
$username="wwwphpde_admin";
$password="fischer72";
$db_name="wwwphpde_db";
try{
$pdo=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
$statement=$pdo->prepare("CREATE TABLE IF NOT EXISTS `products`(`id` INT(10) NOT NULL AUTO_INCREMENT,`products` VARCHAR(30),`quantity` VARCHAR(10),`price` INT(10),PRIMARY KEY(`id`))");
$statement->execute();
}
catch(PDOException $e){
 echo'Connection failed '.$e->getMessage();
}
?> 