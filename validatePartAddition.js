function validateForm()
{
	var errorMessage="";
	var hasFocused=false;
	
	if (document.getElementById("VendorNo").value.length > 30)
	{
		errorMessage=errorMessage.concat("Only up to 30 characters allowed in VendorNo<br/><br/>");
	}
	if (document.getElementById("Description").value.length > 30)
	{
		errorMessage=errorMessage.concat("Only up to 30 characters allowed in Description<br/><br/>");
	}
	if (document.getElementById("OnHand").value.length > 20)
	{
		errorMessage=errorMessage.concat("Only up to 20 characters allowed in OnHand<br/><br/>");
	}
	if (document.getElementById("OnOrder").value.length > 2)
	{
		errorMessage=errorMessage.concat("Only up to 2 characters allowed in OnOrder<br/><br/>");
	}
	if (document.getElementById("Cost").value.length > 6)
	{
		errorMessage=errorMessage.concat("Only up to 6 characters allowed in Cost<br/><br/>");
	}
	if (document.getElementById("ListPrice").value.length > 2)
	{
		errorMessage=errorMessage.concat("Only up to 2 characters allowed in ListPrice<br/><br/>");
	}
	
	if (errorMessage!=""){
		document.getElementById("dialogue").innerHTML="<h2>ERROR:</h2>"+errorMessage;
		return false;
	}
}