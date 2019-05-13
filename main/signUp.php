<?php
require '../libs/Smarty.class.php';
$page = "signUp";
$smarty = new Smarty;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
$retMesse = "";
include ("../model/signup.php");
$ret = sprintf ("%s_retM", $page);
$smarty->assign ($ret, $retMesse);
$go = sprintf ("%s.tpl", $page);
$smarty->display ($go);
?>
