<?php 
$mems = null;
$db = str_con ();
$uid = $_SESSION["user"];
$sel = "select own_id as wid, name as fname, time as ftime, intr as fintr from do_proj where project_id=:pid";
try {
    $ins = $db->prepare ($sel);
    if ($ins) {
        $ins->bindParam (':pid', $pid);
        $result = $ins->execute ();
        if ($result) {
            $files = $ins->fetch (PDO::FETCH_ASSOC);
        }
} catch (PDOException $e) {}
$db = null;
?>
