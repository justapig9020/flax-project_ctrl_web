<?php
require '../libs/Smarty.class.php';
require '../include/sql.php';
require '../include/network.php';
if (!checkIn())
    header("location:index.php");
$page = "overView";
$smarty = new Smarty;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
$retMesse = "";
include ("../model/overView.php");
$smarty->assign("login_retM",$retMesse);
$go = sprintf("%s.tpl",$page);
$smarty->display($go);
?>
