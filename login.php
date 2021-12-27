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

<?php if(!empty($success_message)) {?>
	<div class="alert alert-success">
	     <?php if (isset($success_message))echo $success_message;?>
		 <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
		 </div>	
<?php } ?>
<?php if(!empty($error_message)) {?>
	<div class="alert alert-danger">
	     <?php if (isset($error_message))echo $error_message;?>
		 <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
		 </div>	
<?php } ?>


