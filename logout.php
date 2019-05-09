<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["ip"]);
/*$oid = $_SESSION["oid"];
$pname = $_SESSION["pname"];
$pid = $_SESSION["pid"];
$uid = $_SESSION["user"];
*/
session_destroy();
//echo $_SESSION["user"]."</br>".$_SESSION["ip"];
header("location:./index.php");
?>
