function validateForm()
{
	var errorMessage="";
	var hasFocused=false;
	
	if (document.getElementById("VendorName").value.length > 30)
	{
		errorMessage=errorMessage.concat("Only up to 30 characters allowed in VendorName<br/><br/>");
	}
	if (document.getElementById("Address1").value.length > 30)
	{
		errorMessage=errorMessage.concat("Only up to 30 characters allowed in Address1<br/><br/>");
	}
	if (document.getElementById("City").value.length > 20)
	{
		errorMessage=errorMessage.concat("Only up to 20 characters allowed in City<br/><br/>");
	}
	if (document.getElementById("Prov").value.length > 2)
	{
		errorMessage=errorMessage.concat("Only up to 2 characters allowed in Prov<br/><br/>");
	}
	if (document.getElementById("PostCode").value.length > 6)
	{
		errorMessage=errorMessage.concat("Only up to 6 characters allowed in PostCode<br/><br/>");
	}
	if (document.getElementById("Count").value.length > 2)
	{
		errorMessage=errorMessage.concat("Only up to 2 characters allowed in Count<br/><br/>");
	}
	if (document.getElementById("Phone").value.length > 12)
	{
		errorMessage=errorMessage.concat("Only up to 12 characters allowed in Phone<br/><br/>");
	}
	if (document.getElementById("Fax").value.length > 12)
	{
		errorMessage=errorMessage.concat("Only up to 12 characters allowed in Fax<br/><br/>");
	}
	
	if (errorMessage!=""){
		document.getElementById("dialogue").innerHTML="<h2>ERROR:</h2>"+errorMessage;
		return false;
	}
}