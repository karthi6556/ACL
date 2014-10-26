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
//Assigning values for Roles Table
$role_name=$json->role_name;
$role_purpose=$json->role_purpose;
//Declaring Role_ID in this Format as ROLE01
$con=mysqli_connect($host,$username,$password,$db_name);
mysqli_select_db($db_name,$con);
$query="SELECT * FROM `roles`";
$row=mysqli_query($con,$query);
//ROLE ID
$role_id="ROLE0".mysqli_num_rows($row)+1;
//Exception Handling
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $stmt=$conn->prepare("INSERT INTO `roles`(`role_id`,`role_name`,`role_purpose`)VALUES('$role_id','$role_name','$role_purpose')");
  $stmt->execute();
  echo"Roles Data Inserted Successfully<br>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>