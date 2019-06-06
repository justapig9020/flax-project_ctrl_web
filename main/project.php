<?php
require '../libs/Smarty.class.php';
require '../include/sql.php';
require '../include/network.php';
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



if (isset ($_GET["pid"])) {
    include ("../model/project_selected_model.php");
    $retMess = "";
    $page = "project_selected";
    if (isset ($_POST["wname"]) and
        isset ($_POST["wstart"]) and
        isset ($_POST["wend"])
        ) {
    /*
     * wname
     * wstart
     * wend
     * wintr
     * pid
     *
     */
        $wintr = null;
        if (isset ($_POST["wintr"]))
            $wintr = $_POST["wintr"];
        $retMesse = new_work ($_POST["wname"], $_POST["wstart"], $_POST["wend"], $wintr, $pid); 
    }

    if (isset ($_POST["newTea"])) {
    /*
     * tid
     * pid
     *
     */
        $retMesse = new_Tea (); // add new teacher
    }

    if (isset ($_POST["newMem"])) {
    /*
     * uid
     * pid
     *
     */
        $retMesse = new_Mem ();
    }
    include ("../model/get_Mems.php");
    include ("../model/get_Works.php");
    include ("../model/get_files.php");
    $smarty->assign ("mems", $mems);
    $smarty->assign ("works", $works);
    $smarty->assign ("files", $files);
    $smarty->assign ("retMesse", $retMesse);
} else {
    $page = "project_list";
    include ("../model/project_list_model.php");    
    $smarty->assign ("prjs", $prjs);
    $smarty->assign ("prj_exist", $prj_exist);
}
$smarty->assign ("project_retM", $retMesse);
$go = sprintf ("%s.tpl", $page);
$smarty->display ($go);
?>
