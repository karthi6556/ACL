<?php
//Headers for Declaring Json_decode
header("Access-Control-Allow-Origin: *");
header("Content-Type:text/plain");
//Includes Database Configuration
include'dbConnect.php';
//Get Posted data
$data=file_get_contents("php://input");
//Decodes Posted Objects into Associative Array
$json=json_decode($data);
//Assigning values for Users Table
$user_name=$json->user_name;
$user_designation=$json->user_designation;
$user_department=$json->user_department;
$user_joined=$json->user_joined;
//Declaring User_ID in this Format as USER01
$con=mysqli_connect($host,$username,$password,$db_name);
mysqli_select_db($db_name,$con);
$query="SELECT * FROM `users`";
$row=mysqli_query($con,$query);
//User ID
$user_id="USER0".(mysqli_num_rows($row)+1);
//Exception Handling
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $stmt=$conn->prepare("INSERT INTO `users`(`user_id`,`user_name`,`user_designation`,`user_department`,`user_joined`)VALUES('$user_id','$user_name','$user_designation','$user_department','$user_joined')");
  $stmt->execute();
  echo"User Data Inserted Successfully<br>User-ID:".$user_id;
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>