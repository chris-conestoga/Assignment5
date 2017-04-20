<?php

	include("connection.php");

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
			print "<br/><h3>New row data: $vendorNo, $description, $onHand, $onOrder, $cost, $listPrice</h3>";

			//if successful:
			print "<br/><h3>New row being added to the Parts table...</h3>";
			//insert new data
			$sql = "INSERT INTO Parts VALUES ('$vendorNo', '$description', '$onHand', '$onOrder', '$cost', '$listPrice')";
			//^^not updating database... some kind of fucked-up error.
			$connection = ConnectToDatabase();
			$preparedQuerySelect = $connection -> prepare($sql);
			$preparedQuerySelect -> execute();

			//else provide error:

		}
	}

?>

<html>
	<head>
	</head>
		<body>
			<br/><br/>
			<form id="partphp_form" action="index.php" method="post">
				<input type="hidden" name="source" value="return">
				<input type="submit" value="OK">
			</form>
		</body>
</html>
