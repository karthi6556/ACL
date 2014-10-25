<?php
$mysql_server = 'localhost';
$mysql_username = 'root';
$mysql_password = 'fischer72';
$mysql_database = 'db_ticket';
$mysql_table = 'tb_signup';
$con=mysqli_connect($mysql_server,$mysql_username,$mysql_password,$mysql_database);
$username = $_POST['username'];
$password = $_POST['password'];
?>