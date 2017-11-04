<?php
class User
{
	public function login()
	{
		if($_POST["txtUserName"]=="admin" and $_POST["txtPassword"]=="1234")
		{
			$_SESSION["userName"] = $_POST["txtUserName"];
			return "true";
		}
		else
		{
			return "Invalid user";
		}
	}
	
	public function isLoggedUser()
	{
		if(!isset($_SESSION["userName"]))
		{
			$_SESSION["userName"]="";
		}
		
		if($_SESSION["userName"]=="")
		{
			header('Location: index.php');
		}
	}
	
	public function logout()
	{
		session_destroy();
	}
}
?>