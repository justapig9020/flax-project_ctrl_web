<html>
<head>
    <?php
	include("share/head.php");
	?>
	<link rel="stylesheet" type="text/css" href="/css/normal.css">
</head>
<body>
<header>
    <?php
    include("include/network.php");
	if (!checkIn()) {
		header("location:index.php");
	}
	include("include/sql.php");
	$page = "overview";
	include("share/_headerIn.php");
	?>	
</header>
This is config
<footer>
	<?php
	include("share/_footer.php");
	?>
</footer>
</body>
</html>