<?php
require '../libs/Smarty.class.php';
require '../include/sql.php'
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
    $page = "project_selected";
    if (isset ($_POST["newWork"])) {
    /*
     * wstart
     * wend
     * intr
     * pid
     *
     */
        new_work (); 
    }

    if (isset ($_POST["newTea"])) {
    /*
     * tid
     * pid
     *
     */
        new_Tea (); // add new teacher
    }

    if (isset ($_POST["newMem"])) {
    /*
     * uid
     * pid
     *
     */
        new_Mem ();
    }
    include ("../model/get_Mems.php");
    include ("../model/get_Works.php");
    include ("../model/get_files.php");
    $smarty->assign ("mems", $mems);
    $smarty->assign ("works", $works);
    $smarty->assign ("files", $files);
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
