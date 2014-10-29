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
//Assigning values for Features Table
$features_name=$json->features_name;
$features_descr=$json->features_descr;
$features_perm=$json->features_perm;
//Declaring Features_ID in this Format as FEAT01
$con=mysqli_connect($host,$username,$password,$db_name);
mysqli_select_db($db_name,$con);
$query="SELECT * FROM `features`";
$row=mysqli_query($con,$query);
//Features ID
$features_id="FEAT0".(mysqli_num_rows($row)+1);
//Exception Handling
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $stmt=$conn->prepare("INSERT INTO `features`(`features_id`,`features_name`,`features_descr`,`features_perm`)VALUES('$features_id','$features_name','$features_descr','$features_perm')");
  $stmt->execute();
  echo"Features Data Inserted Successfully.<br>Features-ID:<strong>".$features_id."</srtong>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>