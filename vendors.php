<?php
	$errorMessage = "";
	$message = "";
	function UpdateDatabase()
	{
		$source = "";
		if (isset($_POST['source']))
		{
			$source = $_POST['source'];
		}
		if ($source == "AddVendor")
		{
			$vendorName = $_POST['VendorName'];
			$address1 = $_POST['Address1'];
			$address2 = $_POST['Address2'];
			$city = $_POST['City'];
			$province = $_POST['Prov'];
			$postalCode = $_POST['PostCode'];
			$country = $_POST['Count'];
			$phone = $_POST['Phone'];
			$fax = $_POST['Fax'];
			
			//validate data
			if (VendorVerify($vendorName, $address1, $address2, $city, $province, $postalCode, $country, $phone, $fax))
			{
				$GLOBALS['message'] = "<br/><h3>New Vendor Added: $vendorName</br>Address1: $address1</br>Address2: $address2</br>City: $city</br>Province: $province</br>PostCode: $postalCode</br>Country: $country</br>Phone: $phone</br>Fax: $fax</h3>";

				//insert new data
				$sql = "INSERT INTO Vendors (VendorName, Address1, Address2, City, Province, PostalCode, Country, Phone, Fax) VALUES ($vendorName, $address1, $address2, $city, $province, $postalCode, $country, $phone, $fax)";

				$connection = ConnectToDatabase();
				$preparedQuerySelect = $connection -> prepare($sql);
				$preparedQuerySelect -> execute();

			}
		}
	}

	function VendorVerify($vendorName, $address1, $address2, $city, $province, $postalCode, $country, $phone, $fax)
	{
		if (true)
		{
			return true;
		}
		else
		{
			$GLOBALS_['errorMessage'] = "";
			return false;
		}
		//else provide error:
	}
	function PrintMessages()
	{
		echo "<div id='dialogue'>";
		echo "<span id='message'>";
		if ($GLOBALS['message'] != "")
		{
			echo $GLOBALS['message'];
		}
		echo "</span>";
		
		echo "<span id='errorMessage'>";
		if ($GLOBALS['errorMessage'] != "")
		{
			echo "<h2>ERROR:</h2>";
			echo $GLOBALS['errorMessage'];
		}
		echo "</span>";
		echo "</div>";
	}
?>
