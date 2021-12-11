<?php
session_start();
  $isIndex = 1;
  if(array_key_exists('type',$_SESSION) && isset($_SESSION['type'])) {
	switch($_SESSION['type'])
	{
			case 0:	
				header("Location:");	 //redirect to Admin home
				break;
			case 1:	
				header("Location:");	 //redirect to User home
				break;
			Default :
				header("Location:index");	//redirect to Index
				break;
				
	}
  } else {
    if(!$isIndex) header('Location: index.php');
  }

?>