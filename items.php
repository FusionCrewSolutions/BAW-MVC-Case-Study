<?php
session_start();

//User management
include("Models/User.php");		
$usrObj = new User();	
$usrObj->isLoggedUser();
	
	
//Items management	
include("Models/Item.php");
$itemStsMsg = "";
$itemObj = new item();

//If not the initial load
if(isset($_POST["hidMode"]))
{
	if($_POST["hidMode"]=="save")
	{
		$itemStsMsg = $itemObj->saveItem($_POST["txtItemName"],$_POST["txtItemDesc"]);
	}
	if($_POST["hidMode"]=="update")
	{
		$itemStsMsg = $itemObj->updateItem($_POST["hidID"], $_POST["txtItemName"],$_POST["txtItemDesc"]);
	}
	if($_POST["hidMode"]=="remove")
	{
		$itemStsMsg = $itemObj->removeItem($_POST["hidID"]);
	}
}

$itemsTable = $itemObj->getItems();
?>
<!doctype html>
<html>

<head>
<title>Items</title>
<script src="Controllers/jQuery.js"></script>
<script src="Controllers/controllerMain.js"></script>
</head>

<body>

<form id="formLogout" action="index.php" method="post" name="formLogout">
	<input id="hidLogout" name="hidLogout" type="hidden" value="logout">
	<input id="btnLogout" name="btnLogout" type="button" value="Logout">
</form>
<br>
<form id="formItems" action="items.php" method="post">
	<input id="hidMode" name="hidMode" type="hidden" value="save">
	<input id="hidID" name="hidID" type="hidden" value="0">Item Name
	<input id="txtItemName" name="txtItemName" type="text"> <br>Item Description
	<input id="txtItemDesc" name="txtItemDesc" type="text"> <br>
	<input id="btnSave" name="btnSave" type="button" value="Save"> <br>
	<div id="divStsMsgItem">
		<?php echo $itemStsMsg; ?>
	</div>
</form>
<?php echo $itemsTable; ?>

</body>

</html>
