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
$retMem = "";
$retTea = "";
$retWor = "";
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
        $retWor = new_work ($_POST["wname"], 
                              $_POST["wstart"], 
                              $_POST["wend"], 
                              $wintr, 
                              $pid); 
    }

    if (isset ($_POST["tid"])) {
    /*
     * tid
     * pid
     *
     */
        $retTea = new_Tea ($_POST["tid"], $pid); // add new teacher
    }

    if (isset ($_POST["uid"])) {
    /*
     * uid
     * pid
     *
     */
        $retMem = new_Mem ($_POST["uid"], $pid);
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
