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
			include ("parameters.php");
			$userValue = $_POST['parameter'];
			if (VerifyQuery($userValue))
			{
				$querySelect = "SELECT * FROM Parts WHERE (OnHand <= $userValue)";
			}
			else 
			{
				$querySelect = "SELECT * FROM Parts";
			}
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
		$text .= "<table id='partsTable'>";
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
		
		
		$connection = ConnectToDatabase();
		$querySelect = "SELECT * FROM Parts";
		$preparedQuerySelect = $connection -> prepare($querySelect);
		$preparedQuerySelect -> execute();
		
		$text .= "<td class='input'><select class='input' name='VendorNo'>";
		while ($row = $preparedQuerySelect -> fetch())
		{
			$vendorNo = $row['VendorNo'];
			$vendorNo = round($vendorNo);
			$text .= "<option value='$vendorNo'>$vendorNo</option>";
		}
		$text .= "</select></td>";
		
		
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
		$text .= "Enter new part information to all fields. Press 'Add' to add to database.";
		$text .= "</form>";
			
		echo $text;
	}

?>
