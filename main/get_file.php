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
            $files = get_Files ($pid);
            $smarty->assign ("files", $files);
        }
    }
}
$smarty->display ("templates/get_file.tpl")
?>
