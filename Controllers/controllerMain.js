//==CONTROLLER===============================================================================
//--User-------------------------------------------------
//--Login--
$(document).on("click","#btnLogin",function() 
{
	var result = isValidFormLogin();//use client-Model
	if(result=="true")
	{	$("#formLogin").submit();	}
	else
	{	$("#divStsMsgLogin").html(result);	}
});

//--Logout--
$(document).on("click","#btnLogout", function()
{	$("#formLogout").submit();	});



//--items----------------------------------------------------
//--Save/Update--
$(document).on("click","#btnSave", function()
{
	var result = isValidFormItem();//use client-Model
	if(result=="true")
	{	$("#formItems").submit();	}
	else
	{	$("#divStsMsgItem").html(result);	}
});

//--Edit--
$(document).on("click", "#btnEdit", function()
{
	$("#hidMode").val("update");
	$("#hidID").val($(this).attr("param"));
	$("#txtItemName").val($(this).closest("tr").find('td:eq(1)').text());
	$("#txtItemDesc").val($(this).closest("tr").find('td:eq(2)').text());
});

//--Remove--
$(document).on("click", "#btnRemove", function()
{
	$("#hidMode").val("remove");
	$("#hidID").val($(this).attr("param"));
	$("#formItems").submit();
});

//==CLIENT-MODEL===================================================================
//--User------------------------
function isValidFormLogin()
{
	if($.trim($("#txtUserName").val())=="")
	{	return "Enter Username";	}
	
	if($.trim($("#txtPassword").val())=="")
	{	return "Enter Password";	}
	
	return "true";
}

//--Item-------------------------
function isValidFormItem()
{
	if($.trim($("#txtItemName").val())=="")
	{	return "Enter item name";	}
	
	if($.trim($("#txtItemDesc").val())=="")
	{	return "Enter description";	}
	
	return "true";
}

