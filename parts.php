<?php
	include("connection.php");

	print "<h3>Establishing Database connection...</h3>";

	PartVerify();

	function PartVerify(){

		print "<br/><br/><h3>Checking Data...</h3>";

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
		{
			$vendorNo = $_POST['VendorNo'];
			$description = $_POST['Description'];
			$onHand = $_POST['OnHand'];
			$onOrder = $_POST['OnOrder'];
			$cost = $_POST['Cost'];
			$listPrice = $_POST['ListPrice'];
			//validate data
			print "<h4>New row data: $vendorNo, $description, $onHand, $onOrder, $cost, $listPrice</h4>";

			//if successful:
			print "<br/><h3>New row being added to the Parts table...</h3>";
			//connect to database
			$connection = ConnectToDatabase();
			//insert new data
			$sql = "INSERT INTO Parts VALUES ('$vendorNo', '$description', '$onHand', '$onOrder', '$cost', '$listPrice')";
			
			$connection -> exec($sql);
			//^^^this is the line that is bugged.

			//else provide error:

		}
	}

?>
