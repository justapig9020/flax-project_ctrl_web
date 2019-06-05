<?php
require '../libs/Smarty.class.php';
require '../include/sql.php';
require '../include/network.php';
$page = "project_list";
$smarty = new Smarty;
/*
 *$smarty->debugging = true;
 *$smarty->caching = true;
 *$smarty->cache_lifetime = 120;
 */
$retMesse = "";
if (!checkIn()) {
    header("location:index.php");
}
if (isset($_GET["oid"]) and isset($_GET["pname"])) {
    $page = "project_selected";
    include ("../model/project_selected_model.php");
} else {
    $page = "project_list";
    include ("../model/project_list_model.php");
}
$smarty->assign ("project_retM",$retMesse);
$go = sprintf ("%s.tpl",$page);
$smarty->display ($go);
?>
