<?php
require '../libs/Smarty.class.php';
require '../include/sql.php';
require '../include/network.php';
require "../model/get.php";
$smarty = new Smarty;
/*   
 *$smarty->debugging = true;
 *$smarty->caching = true;
 *$smarty->cache_lifetime = 120;
 */
$retMem = "";
$retTea = "";
$retWor = "";
$retMesse = "";
if (!checkIn()) {
    header("location:index.php");
}

if (isset ($_POST["dpid"])) {
    rm_Proj ($_SESSION["user"], $_POST["dpid"]);
}

if (isset ($_GET["pid"])) {
    include ("../model/project_selected_model.php");
    $retMess = "";
    $retNF = "";
    $page = "project_selected";
    $pid = $_GET["pid"];
    
    if (isset ($_POST["duid"])) {
        rm_mem ($_POST["duid"], $_SESSION["user"], $pid) 
    }

    if (isset ($_FILES)){
        foreach ($_FILES as $file) {
        // string 型態，表示上傳單一檔案
        // array 型態，表示上傳多個檔案
            
            foreach ($file['name'] as $key => $value) {
                //echo "</br>======</br>";
                //echo $key." : ".$value."</br>";
                $retNF = new_file ($value, $_SESSION["user"], $pid);
                if ($retNF >= 1) {
                    $pname = get_Pname ($pid);
                    $path = sprintf ("./users/%d/%s/%s", $_SESSION["user"], $pname, $value);
                    //$path = escapeshellarg($path);
                    //echo $file['tmp_name'][$key]." | ".$path;
                    move_uploaded_file($file['tmp_name'][$key], $path);
                }
            }
        }
    }
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
    //if (isset ($_POST["fname"]))
    if (isset ($_POST["tid"])) {
    /*
     * tid
     * pid
     *
     */
        $retTea = new_Tea ($_POST["tid"], $pid); // add new teacher
    }

    if (isset ($_POST["mid"])) {
    /*
     * uid
     * pid
     *
     */
        $retMem = new_Mem ($_POST["mid"], $pid);
    }
    $mems = get_Mems ($pid);
    if (isset ($_POST["wmon"])) { // select sork month
        $wmon = $_POST["wmon"];
    } else {
        $wmon = (int) date('m', strtotime('-0 month'));
    }
    $pname = get_Pname ($pid);
    $smarty->assign ("pname", $pname);
    $smarty->assign ("pid", $pid);
    $smarty->assign ("mems", $mems);
    $smarty->assign ("retMem", $retMem);
    $smarty->assign ("retTea", $retTea);
    $smarty->assign ("retWor", $retWor);
} else {
    $page = "project_list";
    $prjs = get_Projs ();
    if ($prjs) {
        $prj_exist = 1;
    } else {
        $prj_exist = 0;
    }
    $smarty->assign ("prjs", $prjs);
    $smarty->assign ("prj_exist", $prj_exist);
}
$smarty->assign ("user_id", $_SESSION["user"]);
$smarty->assign ("retMesse", $retMesse);
$go = sprintf ("%s.tpl", $page);
$smarty->display ($go);
?>
