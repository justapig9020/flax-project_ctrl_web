<?php
require '../libs/Smarty.class.php';
require '../include/sql.php';
require '../include/network.php';
require "../model/get.php";
//$smarty = new Smarty;
$works = NULL;
if (checkIn()) {
    if ( isset ($_POST["pid"])) {
        $pid = $_POST["pid"];
        if (isset ($_SESSION["wmon"]))
            $wmon = $_SESSION["wmon"];
        else
            $wmon = date ('m');
        if ( doing_proj ($_SESSION["user"], $pid)) {
            $works = get_Works ($pid, $wmon);
            /*foreach ($works as $row) {
                foreach ($row as $key=>$value) {
                    echo $key.": ".$value."</br>";
                }
            } */
            //$smarty->assign ("works", $works);
        }
    }
}
echo json_encode ($works); 
?>
