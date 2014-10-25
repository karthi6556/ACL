<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:text/plain");
$data=file_get_contents("php://input");
$json=json_decode($data);
$products=$json->prod;
$price=$json->pri;
$quantity=$json->quan;
$host="localhost";
$username="wwwphpde_admin";
$password="fischer72";
$db_name="wwwphpde_db"; 
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $query=$conn->prepare("INSERT INTO `products`(`products`,`quantity`,`price`)VALUES('$products','$quantity','$price')");
 if(!(empty($products)||empty($price)))
 {
  $query->execute();
  echo"<strong>Product_Name:</strong>".$products." <strong>Product_Quantity:</strong>".$quantity." <strong>Product_Price:</strong>Rs.".$price."<br>";
  echo"Product Added Successfully<br>";
 }
 else
 {
  echo"Field Cant be Empty<br>";
 }
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>