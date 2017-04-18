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

		$text = "<tr id='tableHeader'>";
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

?>



