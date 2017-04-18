<html>

	<head>

		<link rel="stylesheet" href="assignment5.css" />

		<?php

			require("vendorTableData.php");

		?>

	</head>

	<body>

		<table>
			<?php
				CreateVendorTableHeader();
				/*FillVendorTable();*/
			?>
			<td class="input">[New]</td>
			<td class="input"><input type="text" name="VendorName"></td>
			<td class="input"><input type="text" name="Address1"></td>
			<td class="input">eh</td>
			<td class="input"><input type="text" name="City"></td>
			<td class="input"><input type="text" name="Prov"></td>
			<td class="input"><input type="text" name="PostCode"></td>
			<td class="input"><input type="text" name="Count"></td>
			<td class="input"><input type="text" name="Phone"></td>
			<td class="input"><input type="text" name="Fax"></td>
		</table>
		<button onclick="">Add New Part</button>
	</body>

</html>



