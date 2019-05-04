<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["ip"]);
session_destroy();
//echo $_SESSION["user"]."</br>".$_SESSION["ip"];
header("location:./index.php");
?>
