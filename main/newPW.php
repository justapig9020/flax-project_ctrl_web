<?php
require '../libs/Smarty.class.php';
include ("../include/network.php");
if (!checkIn()) {
    header("location:index.php");
}
$page = "newPW";
$smarty = new Smarty;
$retMesse = "";
include ("../model/newPW.php");
$smarty->assign ("newPW_retM", $retMesse);
$go = sprintf ("%s.tpl", $page);
$smarty->display ($go);
?>
