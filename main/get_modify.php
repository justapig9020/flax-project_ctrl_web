<?php
include("../include/network.php");
include ("../include/sql.php");
$modifies = NULL;
if (isset ($_POST["pid"]) and
    isset ($_SESSION["user"]) and
    isset ($_POST["mid"])
    ) {
    $modifies = get_mo  ($_POST["pid"], $_SESSION["user"], $_POST["mid"]);          
    echo json_encode ($modifies);
} else {
    echo "逆想幹嘛";
}
?>
