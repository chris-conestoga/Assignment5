<html>

	<head>
		<link rel="stylesheet" href="assignment5.css" />
		<?php
			require("partTableData.php");
			//include("parts.php");
		?>
        <script src="validatePartAddition.js" type="text/javascript"></script>
	</head>
	
	<body>
		<!-- <a href="vendorTable.php">Vendor Table</a> -->
		<!-- <a href="queryTable.php">Query</a> -->
		<form id="part_form" onsubmit="return validateForm()" action="parts.php" method="post">
			<table>
				<?php
					CreatePartTableHeader();
					FillPartTable();
				?>
				<td class="input"><input type="submit" value="Add"></td>
				<td class="input"><input type="text" name="VendorNo" id="VendorNo"></td>
				<td class="input"><input type="text" name="Description" id="Description"></td>
				<td class="input"><input type="text" name="OnHand" id="OnHand"></td>
				<td class="input"><input type="text" name="OnOrder" id="OnOrder"></td>
				<td class="input"><input type="text" name="Cost" id="Cost"></td>
				<td class="input"><input type="text" name="ListPrice" id="ListPrice"></td>
				<input type="hidden" name="source" value="AddPart">
			</table>
		</form>
		<br/>
		<form id="query_form" onsubmit="" action="" method="post">

			Only list parts with fewer than this much 'on hand' inventory: <input type="number" name="parameter">
			<input type="submit" value="Query">
			<input type="hidden" name="source" value="Query">

		</form>

        <span id="dialogue"></span>
	</body>
	
</html>
