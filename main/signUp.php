<?php
require '../libs/Smarty.class.php';
include ("../include/network.php");
if (checkIn())
    header ("location:./overView.php");
$page = "signUp";
$smarty = new Smarty;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
$retMesse = "";
include ("../model/signUp.php");
$smarty->assign ("signUp_retM", $retMesse);
$go = sprintf ("%s.tpl", $page);
$smarty->display ($go);
?>
