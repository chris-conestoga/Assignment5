<html>

	<head>

		<link rel="stylesheet" href="assignment5.css" />

		<?php

			require("vendorTableData.php");

		?>
        <script src="validateVendorAddition.js" type="text/javascript"></script>

	</head>

	<body>
		<a href="index.php">Part Table</a>
		<a href="queryTable.php">Query</a>
		<form id="vendor_form" onsubmit="return validateForm()" action="" method="post">
			<table>
				<?php
					CreateVendorTableHeader();
					/*FillVendorTable();*/
				?>
				<td class="input"><input type="submit" value="Add"></td>
				<td class="input"><input type="text" name="VendorName" id="VendorName"></td>
				<td class="input"><input type="text" name="Address1" id="Address1"></td>
				<td class="input">eh</td>
				<td class="input"><input type="text" name="City" id="City"></td>
				<td class="input"><input type="text" name="Prov" id="Prov"></td>
				<td class="input"><input type="text" name="PostCode" id="PostCode"></td>
				<td class="input"><input type="text" name="Count" id="Count"></td>
				<td class="input"><input type="text" name="Phone" id="Phone"></td>
				<td class="input"><input type="text" name="Fax" id="Fax"></td>
			</table>
		</form>
        <span id="dialogue"></span>
	</body>

</html>



