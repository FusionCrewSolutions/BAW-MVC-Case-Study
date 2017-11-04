<?php
session_start();

$loginMsg="";

//If not the initial load
if ( !empty($_POST) )
{
	include("Models/User.php");	
	$usrObj = new User();

	if(isset($_POST["txtUserName"]))
	{			
		$loginMsg = $usrObj->login();
		
		if($loginMsg=="true")
		{
			header('Location: items.php');
		}
	}
	elseif(isset($_POST["hidLogout"]))
	{
		$usrObj->logout();
	}
}
?>
<!doctype html>
<html>

<head>
<title>Login</title>
<script src="Controllers/jQuery.js"></script>
<script src="Controllers/controllerMain.js"></script>
</head>

<body>

<form id="formLogin" action="index.php" method="post">
	UserName <input id="txtUserName" name="txtUserName" type="text"> <br>Password
	<input id="txtPassword" name="txtPassword" type="password"> <br>
	<input id="btnLogin" name="btnLogin" type="button" value="Login">
	<a href="requestPassword.php">Forgot password </a><br>
	<div id="divStsMsgLogin">
		<?php echo $loginMsg; ?></div>
</form>

</body>

</html>
