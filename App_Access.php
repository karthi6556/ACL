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
//Assigning values for App Configuration
$config_type=$json->Config_Type;
$config_code=$json->Config_Code;
$config_desc=$json->Config_Desc;
//Declaring Config_code in this Format SSC301020141
$date=date(dmY);
$con=mysqli_connect($host,$username,$password,$db_name);
mysqli_select_db($db_name,$con);
$query="SELECT * FROM `App_Config`";
$row=mysqli_query($con,$query);
//Config_code
$cc=$config_code.$date.(mysqli_num_rows($row)+1);
//Exception Handling
try{
 $conn=new PDO("mysql:dbname=$db_name;host=$host","$username","$password");
 $stmt=$conn->prepare("INSERT INTO `App_Config`(`Config_Type`,`Config_Code`,`Config_Desc`)VALUES('$config_type','$cc','$config_desc')");
  $stmt->execute();
  echo"App Config Inserted Successfully.<br>Config_Code:<strong>".$cc."</srtong>";
}
catch(PDOException $e)
{
 echo'Connection failed'.$e->getMessage();
}
?>