function validateForm()
{
	var errorMessage="";
	var hasFocused=false;
	
	if (isNaN(document.getElementById("VendorNo").value))
	{
		errorMessage=errorMessage.concat("VendorNo must be a number<br/><br/>");
	}
	if (document.getElementById("Description").value.length > 30)
	{
		errorMessage=errorMessage.concat("Only up to 30 characters allowed in Description<br/><br/>");
	}
	if (isNaN(document.getElementById("OnHand").value))
	{
		errorMessage=errorMessage.concat("OnHand must be a number<br/><br/>");
	}
	if (isNaN(document.getElementById("OnOrder").value))
	{
		errorMessage=errorMessage.concat("OnOrder must be a number<br/><br/>");
	}
	if (isNaN(document.getElementById("Cost").value))
	{
		errorMessage=errorMessage.concat("Cost must be a number<br/><br/>");
	}
	if (isNaN(document.getElementById("ListPrice").value))
	{
		errorMessage=errorMessage.concat("ListPrice must be a number<br/><br/>");
	}
	
	if (errorMessage!=""){
		document.getElementById("dialogue").innerHTML="<h2>ERROR:</h2>"+errorMessage;
		return false;
	}
}