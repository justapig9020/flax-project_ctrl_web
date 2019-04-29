now login
<?php
$dir = basename(__DIR__);
echo $dir."</br>";
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION)) {
	echo "S: ".$_SESSION[$dir]."</br>";
} else {
	echo "no";
}
/*echo __FILE__."</br>".basename(__FILE__)."</br>".basename(__FILE__,'dex.php')."</br>".dirname(__FILE__)."</br>".dirname(dirname(__FILE__))."</br>";*/
?>
