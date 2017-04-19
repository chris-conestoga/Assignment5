<?php

	include("connection.php");

	function FillPartTable()
	{

		$tableBodyText = "";
		$userValue = 11;

		$connection = ConnectToDatabase();

		$querySelect = "SELECT * FROM Parts WHERE (OnHand < $userValue)";
		$preparedQuerySelect = $connection -> prepare($querySelect);
		$preparedQuerySelect -> execute();

		while ($row = $preparedQuerySelect -> fetch())
		{

			$partID = $row['PartID'];
			$partID = round($partID);
			$vendorNo = $row['VendorNo'];
			$vendorNo = round($vendorNo);
			$description = $row['Description'];
			$onHand = $row['OnHand'];
			$onHand = round($onHand);
			$onOrder = $row['OnOrder'];
			$onOrder = round($onOrder);
			$cost = $row['Cost'];
			$listPrice = $row['ListPrice'];

			$tableBodyText .= "<tr>";
			$tableBodyText .= "<td>$partID</td>";
			$tableBodyText .= "<td class='text'>$vendorNo</td>";
			$tableBodyText .= "<td class='text'>$description</td>";
			$tableBodyText .= "<td class='text'>$onHand</td>";
			$tableBodyText .= "<td class='text'>$onOrder</td>";
			$tableBodyText .= "<td class='text'>$cost</td>";
			$tableBodyText .= "<td class='text'>$listPrice</td>";
			$tableBodyText .= "</tr>";

		}

		echo "<h3>The following Parts have an On Hand quantity of less than $userValue :</h3><br/><br/>";
		echo $tableBodyText;

	}


	function CreatePartTableHeader()
	{

		$text = "<tr id='tableHeader'>";
		$text .= "<th>PartID</th>";
		$text .= "<th>VendorNo</th>";
		$text .= "<th>Description</th>";
		$text .= "<th>OnHand</th>";
		$text .= "<th>OnOrder</th>";
		$text .= "<th>Cost</th>";
		$text .= "<th>ListPrice</th>";
		$text .= "</tr>";

		echo $text;

	}

?>
