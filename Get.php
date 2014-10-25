<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:text/plain");
$host="localhost";
$username="wwwphpde_admin";
$password="fischer72";
$db_name="wwwphpde_db";  
try{
$pdo=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
$statement=$pdo->prepare("SELECT `username` FROM tb_signup LIMIT 5");
$statement->execute();
$array = $statement->fetchAll();
$stmt=$pdo->prepare("SELECT * FROM `products`");
$stmt->execute();
$arr=$stmt->fetchALL();
$a=array();
$a['user']=$array;
$a['prod']=$arr;
echo json_encode($a);
}
catch(PDOException $e){
 echo'Connection failed '.$e->getMessage();
}
?> 