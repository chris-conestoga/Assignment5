<?php

	include("connection.php");

	function FillPartTable()
	{

		$tableBodyText = "";

		$connection = ConnectToDatabase();

		if (isset($_POST['source']))
		{
			$source = $_POST['source'];
		}
		else
		{
			$source = "";
		}

		if ($source == "Query")
		{
			$userValue = $_POST['parameter'];
			$querySelect = "SELECT * FROM Parts WHERE (OnHand < $userValue)";
		}
		else
		{
			$querySelect = "SELECT * FROM Parts";
		}

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
