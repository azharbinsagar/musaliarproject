<?php
require("session.php");
require_once("asset/db/db.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	foreach($_POST as $key=>$value)
	{
	if(empty($_POST[$key]))
	{
		$error_message="All fields are required";
		break;
	}
	}
	if(!isset($error_message)) {
	$uname=$_POST["username"];
	$pass=$_POST["password"];
	$query="SELECT * FROM `login` WHERE `username`='$uname'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		$obj=mysqli_fetch_object($result);
		$dbpass=$obj->password;
		if (password_verify($pass,$dbpass))
		{
			$_SESSION["username"]=$uname;
			$type=$obj->type;
			$_SESSION["type"]=$type;
			unset($_POST);
		$success_message="<script>setTimeout(function(){
		window.location=\"\";},1000);</script><img src=\"asset/images/loading.gif\">
		<strong>Welcome</strong>,you are being logged in..";
	}
		else
		{
			$error_message ="Wrong Password";
		}
	}
		else
		{
				$error_message ="Invalid User";
         }
}		 
}		 
?>
