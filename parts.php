<?php
	include("connection.php");
	$valid = false;

	print "<h3>Checking Data...</h3>";

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$vendorNo = $_POST['VendorNo'];
		$description = $_POST['Description'];
		$onHand = $_POST['OnHand'];
		$onOrder = $_POST['OnOrder'];
		$cost = $_POST['Cost'];
		$listPrice = $_POST['ListPrice'];
		//validate data
		//summarize data and set value to true or give error

		//$valid = true;
	}
	if ($valid){
		print "New Data being added to the Parts table...";
		//connect to database

		$connection = ConnectToDatabase();
		//insert new data
		INSERT INTO Parts VALUES ($vendorNo, $description, $onHand, $onOrder, $cost, $listPrice);
	}
?>
