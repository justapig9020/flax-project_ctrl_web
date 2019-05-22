<?php
require '../libs/Smarty.class.php';
$page = "login";
$smarty = new Smarty;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
$retMesse = "";
include ("../model/login.php");
$smarty->assign("login_retM",$retMesse);
$go = sprintf("%s.tpl",$page);
$smarty->display($go);
?>
