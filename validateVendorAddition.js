function validateForm()
{
	var errorMessage="";
	var hasFocused=false;
	
	
	if (document.getElementById("VendorName").value + "" == "")
		errorMessage=errorMessage.concat("VendorName required<br/><br/>");
	
	if (document.getElementById("Address1").value + "" == "")
		errorMessage=errorMessage.concat("Address1 required<br/><br/>");
	
	if (document.getElementById("Address2").value + "" == "")
		errorMessage=errorMessage.concat("Address2 required<br/><br/>");
	
	if (document.getElementById("City").value + "" == "")
		errorMessage=errorMessage.concat("City required<br/><br/>");
	
	if (document.getElementById("Prov").value + "" == "")
		errorMessage=errorMessage.concat("Prov required<br/><br/>");
	
	if (document.getElementById("PostCode").value + "" == "")
		errorMessage=errorMessage.concat("PostCode required<br/><br/>");
	
	if (document.getElementById("Count").value + "" == "")
		errorMessage=errorMessage.concat("Count required<br/><br/>");
	
	if (document.getElementById("Phone").value + "" == "")
		errorMessage=errorMessage.concat("Phone required<br/><br/>");
	
	if (document.getElementById("Fax").value + "" == "")
		errorMessage=errorMessage.concat("Fax required<br/><br/>");
	
	
	
	if (document.getElementById("VendorName").value.length > 30)
		errorMessage=errorMessage.concat("Only up to 30 characters allowed in VendorName<br/><br/>");
	
	if (document.getElementById("Address1").value.length > 30)
		errorMessage=errorMessage.concat("Only up to 30 characters allowed in Address1<br/><br/>");
	
	if (document.getElementById("Address2").value.length > 30)
		errorMessage=errorMessage.concat("Only up to 30 characters allowed in Address2<br/><br/>");
	
	if (document.getElementById("City").value.length > 20)
		errorMessage=errorMessage.concat("Only up to 20 characters allowed in City<br/><br/>");
	
	if (document.getElementById("Prov").value.length > 2)
		errorMessage=errorMessage.concat("Only up to 2 characters allowed in Prov<br/><br/>");
	
	if (document.getElementById("PostCode").value.length > 6)
		errorMessage=errorMessage.concat("Only up to 6 characters allowed in PostCode<br/><br/>");
	
	if (document.getElementById("Count").value.length > 2)
		errorMessage=errorMessage.concat("Only up to 2 characters allowed in Count<br/><br/>");
	
	if (document.getElementById("Phone").value.length > 12)
		errorMessage=errorMessage.concat("Only up to 12 characters allowed in Phone<br/><br/>");
	
	if (document.getElementById("Fax").value.length > 12)
		errorMessage=errorMessage.concat("Only up to 12 characters allowed in Fax<br/><br/>");
	
	
	
	if (errorMessage!="")
	{
		document.getElementById("errorMessage").innerHTML = "";
		if (document.getElementById("errorMessage").innerHTML == "")
		{
			errorMessage="<h2>ERROR:</h2>"+errorMessage;
		}	document.getElementById("errorMessage").innerHTML=document.getElementById("errorMessage").innerHTML+errorMessage;
		return false;
	}
}