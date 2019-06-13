<?php
require '../libs/Smarty.class.php';
require '../include/sql.php';
require '../include/network.php';
require "../model/get.php";
$smarty = new Smarty;
$files = NULL;
if (checkIn()) {
    if ( isset ($_POST["pid"])) {
        $pid = $_POST["pid"];
        if ( doing_proj ($_SESSION["user"], $pid)) {
            //$works = get_Works ($pid, $wmon);
            //$smarty->assign ("works", $works);
        }
    }
}
$smarty->display ("templates/get_work.tpl")
?>
