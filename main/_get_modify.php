<?php
require '../libs/Smarty.class.php';
$page = "get_modify";
$smarty = new Smarty;
$retMesse = "";
include("../include/network.php");
include("../include/sql.php");
if (!checkIn()) {
    header ("location:./index.php");
}
if (isset ($_POST["lid"])) { // select sork month
    $lid = $_POST["lid"];
    $db = str_con ();
    $uid = $_SESSION["user"];
    $sel = "select modify.* from modify 
            inner join file on modify.file_id = file.id 
            where file.project_id in 
            (select project_id from do_proj where user_id = :uid";
    if (isset ($_POST["pid"])) {
        $pid = $_POST["pid"];
        $sel = $sel." and project_id = :pid";
    }
    $sel = $sel.")";
    if ($lid != 0) {
        $sel = $sel."and modify.id < :lid";
    }
    $sel = $sel." order by modify.id DESC limit 5;";
    try {
        $ins = $db->prepare ($sel);
        if ($ins) {
            $ins->bindParam (':uid', $uid);
            if ($lid != 0)
                $ins->bindParam (':lid', $lid);
            if (isset ($_POST["pid"]))
                $ins->bindParam (':pid', $pid);
            $result = $ins->execute ();
            if ($result) {
                $modifies = $ins->fetchAll (PDO::FETCH_ASSOC);
            }
        }
    } catch (PDOException $e) {}
    $db = null;
}
$smarty->assign("modifies",$modifies);
$go = sprintf("%s.tpl",$page);
$smarty->display($go);
?>