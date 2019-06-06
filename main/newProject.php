<?php
require '../libs/Smarty.class.php';
require '../include/sql.php';
require '../include/network.php';
$page = "newProject";
$smarty = new Smarty;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
$retMesse = "";

if (isset ($_POST["pname"])) {
    if (isset ($_POST["pintr"]))
        $pintr = $_POST["pintr"];
    else
        $pintr ="";
    $retMesse = new_proj ($_POST["pname"], $pintr, $_SESSION["user"]);
}

$smarty->assign("retMesse",$retMesse);
$go = sprintf("%s.tpl",$page);
$smarty->display($go);
?>
