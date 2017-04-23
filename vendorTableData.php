<?php

	include("connection.php");

	function FillVendorTable()
	{

		$tableBodyText = "";

		$connection = ConnectToDatabase();

		$querySelect = "SELECT * FROM Vendors";
		$preparedQuerySelect = $connection -> prepare($querySelect);
		$preparedQuerySelect -> execute();

		while ($row = $preparedQuerySelect -> fetch())
		{

			$vendorNo = $row['VendorNo'];
			$vendorNo = round($vendorNo);
			$vendorName = $row['VendorName'];
			$address1 = $row['Address1'];
			$address2 = $row['Address2'];
			$city = $row['City'];
			$province = $row['Prov'];
			$postalCode = $row['PostCode'];
			$country = $row['Country'];
			$phone = $row['Phone'];
			$fax = $row['Fax'];

			$tableBodyText .= "<tr>";
			$tableBodyText .= "<td>$vendorNo</td>";
			$tableBodyText .= "<td class='text'>$vendorName</td>";
			$tableBodyText .= "<td class='text'>$address1</td>";
			$tableBodyText .= "<td class='text'>$address2</td>";
			$tableBodyText .= "<td class='text'>$city</td>";
			$tableBodyText .= "<td class='text'>$province</td>";
			$tableBodyText .= "<td class='text'>$postalCode</td>";
			$tableBodyText .= "<td class='text'>$country</td>";
			$tableBodyText .= "<td class='text'>$phone</td>";
			$tableBodyText .= "<td class='text'>$fax</td>";
			$tableBodyText .= "</tr>";

		}

		echo $tableBodyText;

	}


	function CreateVendorTableHeader()
	{
		
		$text = "<form id='vendor_form' onsubmit='return validateForm()' action='' method='post'>";
		$text .= "<table>";
		$text .= "<tr id='tableHeader'>";
		$text .= "<th>VendorNo</th>";
		$text .= "<th>VendorName</th>";
		$text .= "<th>Address1</th>";
		$text .= "<th>Address2</th>";
		$text .= "<th>City</th>";
		$text .= "<th>Prov</th>";
		$text .= "<th>PostCode</th>";
		$text .= "<th>Count</th>";
		$text .= "<th>Phone</th>";
		$text .= "<th>Fax</th>";
		$text .= "</tr>";

		echo $text;

	}
	function CreateVendorTableInput()
	{
		
		$text = "<td class='input'><input type='submit' value='Add'></td>";
		$text .= "<td class='input'><input type='text' name='VendorName' id='VendorName'></td>";
		$text .= "<td class='input'><input type='text' name='Address1' id='Address1'></td>";
		$text .= "<td class='input'><input type='text' name='Address2' id='Address2'></td>";
		$text .= "<td class='input'><input type='text' name='City' id='City'></td>";
		$text .= "<td class='input'><input type='text' name='Prov' id='Prov'></td>";
		$text .= "<td class='input'><input type='text' name='PostCode' id='PostCode'></td>";
		$text .= "<td class='input'><input type='text' name='Count' id='Count'></td>";
		$text .= "<td class='input'><input type='text' name='Phone' id='Phone'></td>";
		$text .= "<td class='input'><input type='text' name='Fax' id='Fax'></td>";
		$text .= "<input type='hidden' name='source' value='AddVendor'>";
		if (isset($_POST['navigate']))
		{
			echo "<input type='hidden' name='navigate' value='".$_POST['navigate']."'>";
		}
		$text .= "</table>";
		$text .= "</form>";
			
		echo $text;
	}

?>



