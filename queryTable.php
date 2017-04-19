<html>

	<head>

		<link rel="stylesheet" href="assignment5.css" />

		<?php

			require("queryTableData.php");

		?>
        <script src="validateQuery.js" type="text/javascript"></script>

	</head>

	<body>
		<a href="index.php">Part Table</a>
		<a href="vendorTable.php">Vendor Table</a>
		<form id="query_form" onsubmit="return validateForm()" action="" method="post">
			<table>
				<!-- To be determined
				<?php
					//CreatePartTableHeader();
					//FillPartTable();
				?>
				-->
			</table>
		</form>
        <span id="dialogue"></span>
	</body>

</html>



