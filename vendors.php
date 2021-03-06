<?php
	$errorMessage = "";
	$message = "";

//	checks if user is trying to add a new vendor, validates the data and
//	adds it to the table
	function UpdateDatabase()
	{
		$source = "";
		if (isset($_POST['source']))
		{
			$source = $_POST['source'];
		}
		if ($source == "AddVendor")
		{
			$vendorNo = GenerateVendorNo();
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
			if (VendorVerify($vendorName, $address1, $address2, $city, $province, $postalCode, $country, $phone))
			{
				$GLOBALS['message'] = "<br/><h3>New Vendor Added: $vendorName [$vendorNo]</br>Address1: $address1</br>Address2: $address2</br>City: $city</br>Province: $province</br>PostCode: $postalCode</br>Country: $country</br>Phone: $phone</br>Fax: $fax</h3>";

				//insert new data
				$sql = "INSERT INTO Vendors (VendorNo, VendorName, Address1, Address2, City, Prov, PostCode, Country, Phone, Fax) VALUES ($vendorNo, '$vendorName', '$address1', '$address2', '$city', '$province', '$postalCode', '$country', '$phone', '$fax')";

				$connection = ConnectToDatabase();
				$preparedQuerySelect = $connection -> prepare($sql);
				$preparedQuerySelect -> execute();

			}
		}
	}

//	validates the users input
	function VendorVerify($vendorName, $address1, $address2, $city, $province, $postalCode, $country, $phone)
	{
		$GLOBALS['errorMessage'] = "";
		if (is_null($vendorName))
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a vendor name.<br/>";
		}
		if (is_null($address1) || strlen($address1) < 4)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a vendor street address at least 4 characters in length.<br/>";
		}
		if (is_null($address2) || strlen($address2) < 4)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a vendor street address2 at least 4 characters in length.<br/>";
		}
		if (is_null($city) || strlen($city) < 3)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a city at least 3 characters in length.<br/>";
		}
		if (is_null($province) || strlen($province) < 2)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a province at least 2 characters in length.<br/>";
		}
		if (is_null($postalCode) || strlen($postalCode) < 5)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a postal code at least 5 characters in length.<br/>";
		}
		if (is_null($country) || strlen($country) < 2)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a country at least 2 characters in length.<br/>";
		}
		if (is_null($phone) || strlen($phone) < 10)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a phone number (including area code) at least 10 characters in length.<br/>";
		}

		if ($GLOBALS['errorMessage'] == "")
		{
			return true;
		}
		else
		{
			return false;
		}
	}

//	checks if any messages or error messages exist, and displays them
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

//	generates new unique vendor number
	function GenerateVendorNo()
	{
		$connection = ConnectToDatabase();
		$querySelect = "SELECT MAX(VendorNo) FROM Vendors";
		$preparedQuerySelect = $connection -> prepare($querySelect);
		$preparedQuerySelect -> execute();
		$vendorNo = $preparedQuerySelect -> fetch();
		return ($vendorNo[0]+1);
	}
?>
