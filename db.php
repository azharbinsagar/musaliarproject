<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="dbname";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno($con))
{
	echo "failed to connect".mysqli_connect_error($con);
}
?>