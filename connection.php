<?php
$host="localhost";
$uname="root";
$pass="";
$db="mitesh_data";
$con=mysqli_connect($host,$uname,$pass,$db);
if(!$con){
	echo "Connection Failes";
}	
?>