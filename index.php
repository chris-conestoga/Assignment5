<html>

	<head>

		<link rel="stylesheet" href="assignment5.css" />

		<?php

			require("partTableData.php");

		?>
        <script src="validateVendorAddition.js" type="text/javascript"></script>

	</head>

	<body>
		<form id="part_form" onsubmit="return validateForm()" action="" method="post">
			<table>
				<?php
					CreatePartTableHeader();
					FillPartTable();
				?>
			</table>
		</form>
	</body>

</html>



