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
			$querySelect = "SELECT * FROM Parts WHERE (OnHand <= $userValue)";
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
		$text = "<form id='part_form' onsubmit='return validateForm()' action='index.php' method='post'>";
		$text .= "<table>";
		$text .= "<tr id='tableHeader'>";
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
	
	function CreatePartTableInput()
	{
		
		$text = "<td class='input'><input type='submit' value='Add'></td>";
		$text .= "<td class='input'><input type='text' name='VendorNo' id='VendorNo'></td>";
		$text .= "<td class='input'><input type='text' name='Description' id='Description'></td>";
		$text .= "<td class='input'><input type='text' name='OnHand' id='OnHand'></td>";
		$text .= "<td class='input'><input type='text' name='OnOrder' id='OnOrder'></td>";
		$text .= "<td class='input'><input type='text' name='Cost' id='Cost'></td>";
		$text .= "<td class='input'><input type='text' name='ListPrice' id='ListPrice'></td>";
		$text .= "<input type='hidden' name='source' value='AddPart'>";
		if (isset($_POST['navigate']))
		{
			echo "<input type='hidden' name='navigate' value='".$_POST['navigate']."'>";
		}
		$text .= "</table>";
		$text .= "</form>";
			
		echo $text;
	}

?>
