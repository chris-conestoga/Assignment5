//validates user inputs when trying to add new part
function validateForm()
{
	var errorMessage="";
	var hasFocused=false;
	
	alert("test");
	if (document.getElementById("VendorNo").value + "" == "")
		errorMessage=errorMessage.concat("VendorNo required<br/><br/>");
	
	if (document.getElementById("Description").value + "" == "")
		errorMessage=errorMessage.concat("Description required<br/><br/>");
	
	if (document.getElementById("OnHand").value + "" == "")
		errorMessage=errorMessage.concat("OnHand quantity required<br/><br/>");
	
	if (document.getElementById("OnOrder").value + "" == "")
		errorMessage=errorMessage.concat("OnOrder quantity required<br/><br/>");
	
	if (document.getElementById("Cost").value + "" == "")
		errorMessage=errorMessage.concat("Cost required<br/><br/>");
	
	if (document.getElementById("ListPrice").value + "" == "")
		errorMessage=errorMessage.concat("ListPrice required<br/><br/>");
	
	
	
	if (isNaN(document.getElementById("VendorNo").value))
		errorMessage=errorMessage.concat("VendorNo must be a number<br/><br/>");
	
	if (document.getElementById("Description").value.length > 30)
		errorMessage=errorMessage.concat("Only up to 30 characters allowed in Description<br/><br/>");
	
	if (isNaN(document.getElementById("OnHand").value))
		errorMessage=errorMessage.concat("OnHand must be a number<br/><br/>");
	
	if (isNaN(document.getElementById("OnOrder").value))
		errorMessage=errorMessage.concat("OnOrder must be a number<br/><br/>");
	
	if (isNaN(document.getElementById("Cost").value))
		errorMessage=errorMessage.concat("Cost must be a number<br/><br/>");
	
	if (isNaN(document.getElementById("ListPrice").value))
		errorMessage=errorMessage.concat("ListPrice must be a number<br/><br/>");
	
	
//	prints error message if one exists, and returns false if validation failed
	if (errorMessage != "")
	{
		document.getElementById("errorMessage").innerHTML = "";
		if (document.getElementById("errorMessage").innerHTML+"" == "")
		{
			errorMessage="<h2>ERROR:</h2>"+errorMessage;
		}	document.getElementById("errorMessage").innerHTML=document.getElementById("errorMessage").innerHTML+errorMessage;
		alert("return false");
		return false;
	}
}