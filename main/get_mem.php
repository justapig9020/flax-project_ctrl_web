<?php
require '../libs/Smarty.class.php';
require '../include/sql.php';
require '../include/network.php';
require "../model/get.php";
$smarty = new Smarty;
$mems = NULL;
if (checkIn()) {
    if ( isset ($_POST["pid"])) {
        $pid = $_POST["pid"];
        if ( doing_proj ($_SESSION["user"], $pid)) {
            if (isset ($_POST["duid"])) {
                rm_mem ($_POST["duid"], $_SESSION["user"], $pid);
            }
            $mems = get_Mems ($pid);
            $smarty->assign ("mems", $mems);
        }
    }
}
$smarty->display ("templates/get_mem.tpl")
?>
