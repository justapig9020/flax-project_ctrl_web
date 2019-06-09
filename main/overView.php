<?php
require '../libs/Smarty.class.php';
require '../include/sql.php';
require '../include/network.php';
require '../model/get.php';
if (!checkIn())
    header("location:index.php");
$page = "overView";
$smarty = new Smarty;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
$prjs = get_Projs ();
$smarty->assign ("prjs", $prjs);
$go = sprintf("%s.tpl",$page);
$smarty->display($go);
?>
