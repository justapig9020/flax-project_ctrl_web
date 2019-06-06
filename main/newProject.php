<?php
require '../libs/Smarty.class.php';
require '../include/sql.php';
require '../include/network.php';
$page = "";
$smarty = new Smarty;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
$retMesse = "";
if (isset ($_POST[""]))
$smarty->assign("login_retM",$retMesse);
$go = sprintf("%s.tpl",$page);
$smarty->display($go);
?>
