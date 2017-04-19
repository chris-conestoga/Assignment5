<html>

	<head>
		<link rel="stylesheet" href="assignment5.css" />
		<?php
			require("partTableData.php");
		?>
        <script src="validatePartAddition.js" type="text/javascript"></script>
	</head>
	
	<body>
		<a href="vendorTable.php">Vendor Table</a>
		<a href="queryTable.php">Query</a>
		<form id="part_form" onsubmit="return validateForm()" action="" method="post">
			<table>
				<?php
					CreatePartTableHeader();
					//FillPartTable();
				?>
				<td class="input"><input type="submit" value="Add"></td>
				<td class="input"><input type="text" name="VendorNo" id="VendorNo"></td>
				<td class="input"><input type="text" name="Description" id="Description"></td>
				<td class="input"><input type="text" name="OnHand" id="OnHand"></td>
				<td class="input"><input type="text" name="OnOrder" id="OnOrder"></td>
				<td class="input"><input type="text" name="Cost" id="Cost"></td>
				<td class="input"><input type="text" name="ListPrice" id="ListPrice"></td>
			</table>
		</form>
        <span id="dialogue"></span>
	</body>
	
</html>



