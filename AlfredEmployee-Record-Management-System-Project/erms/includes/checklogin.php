<?php
function check_login()
{
if(strlen($_SESSION['uid'])==0)
	{	
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="";		
		$_SESSION["uid"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>