<html>

	<head>
		<link rel="stylesheet" href="assignment5.css" />
		<?php
//			Used to switch which files are loaded based on if
//			the user is viewing the part table or vendor table.
//			Default is part table
			$navigate = "";
			if (isset($_POST['navigate']))
			{
				$navigate = $_POST['navigate'];
			}
			if ($navigate == "vendor")
			{
				require("vendorTableData.php");
				//include("vendors.php");
				echo "<script src='validateVendorAddition.js' type='text/javascript'></script>";
			}
			else
			{
				require("partTableData.php");
				//include("parts.php");
				echo "<script src='validatePartAddition.js' type='text/javascript'></script>";
			}
		?>
	</head>
	
	<body>
		<nav>
			<form action="index.php" method="post">
				<input type="submit" value="Part Table">
				<input type="hidden" name="navigate" value="part">
			</form>
			<form action="index.php" method="post">
				<input type="submit" value="Vendor Table">
				<input type="hidden" name="navigate" value="vendor">
			</form>
		</nav>
		<?php
//			Used to populate the table based on if
//			the user is viewing the part table or vendor table.
//			Default is part table
			$navigate = "";
			if (isset($_POST['navigate']))
			{
				$navigate = $_POST['navigate'];
			}
			if ($navigate == "vendor")
			{
				CreateVendorTableHeader();
				FillVendorTable();
				CreateVendorTableInput();
			}
			else
			{
				CreatePartTableHeader();
				FillPartTable();
				CreatePartTableInput();
			}
		?>
		<br/>
		<form id="query_form" onsubmit="" action="" method="post">

			Only list parts with fewer than this much 'on hand' inventory: <input type="number" name="parameter">
			<input type="submit" value="Query">
			<input type="hidden" name="source" value="Query">
			<?php
//				Used to pass a hidden variable along with the query
//				to make sure the user ends up on the same table
//				they navigated to.
//				Default is part table
				$navigate = "";
				if (isset($_POST['navigate']))
				{
					$navigate = $_POST['navigate'];
				}
				if ($navigate == "vendor")
				{
					echo "<input type='hidden' name='navigate' value='vendor'>";
				}
				else
				{
					echo "<input type='hidden' name='navigate' value='part'>";
				}
			?>
		</form>

        <span id="dialogue"></span>
	</body>
	
</html>
