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
		if ($source == "AddPart")
		{
			$vendorNo = $_POST['VendorNo'];
			$description = $_POST['Description'];
			$onHand = $_POST['OnHand'];
			$onOrder = $_POST['OnOrder'];
			$cost = $_POST['Cost'];
			$listPrice = $_POST['ListPrice'];
			
			//validate data
			if (PartVerify($vendorNo, $description, $onHand, $onOrder, $cost, $listPrice))
			{
				$GLOBALS['message'] = "<br/><h3>New part Added: Vendor Number: $vendorNo, Description: $description.</br>$onHand on-hand and $onOrder on-order, cost: $$cost, and list price: $$listPrice.</h3>";

				//insert new data
				$sql = "INSERT INTO Parts (VendorNo, Description, OnHand, OnOrder, Cost, ListPrice) VALUES ($vendorNo, '$description', $onHand, $onOrder, $cost, $listPrice)";

				$connection = ConnectToDatabase();
				//NEED THIS FIXED!!
				//$preparedQuerySelect = $connection -> prepare($sql);
				//$preparedQuerySelect -> execute();

			}
		}
	}
	function PartVerify($vendorNo, $description, $onHand, $onOrder, $cost, $listPrice)
	{
		$GLOBALS['errorMessage'] = "";
		if (is_null($vendorNo))
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a vendor number.<br/>";
		}
		if (is_null($description) || strlen($description) < 4)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a part description.<br/>";
		}
		if (is_null($onHand) || $onHand < 0)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter an amount of on-Hand inventory.<br/>";
		}
		if (is_null($onOrder) || $onOrder < 0)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter an amount of on-Order inventory.<br/>";
		}
		if (is_null($cost) || $cost < 0)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a cost.<br/>";
		}
		if (is_null($listPrice) || $listPrice < 0)
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."You must enter a list price.<br/>";
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
