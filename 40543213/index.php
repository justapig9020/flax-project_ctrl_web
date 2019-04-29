<html>
<head>
	<?php
	include("../share/head.php");
	?>
</head>
<body>
<?php
session_start();
$dir = basename(__DIR__);
echo $dir."</br>".gettype($dir)."</br>";
echo "S: ".$_SESSION['asd']."</br>";
/*echo __FILE__."</br>".basename(__FILE__)."</br>".basename(__FILE__,'dex.php')."</br>".dirname(__FILE__)."</br>".dirname(dirname(__FILE__))."</br>";*/
?>
now login
<footer>
	<?php
	include("../share/_footer.php");
	?>
</footer>
</body>
</html>