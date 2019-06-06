<?php 
$mems = null;
$db = str_con ();
$uid = $_SESSION["user"];
$sel = "select user_id as uid from do_proj where project_id=:pid";
try {
    $ins = $db->prepare ($sel);
    if ($ins) {
        $ins->bindParam (':pid', $pid);
        $result = $ins->execute ();
        if ($result) {
            $mems = $ins->fetchAll (PDO::FETCH_ASSOC);
        }
} catch (PDOException $e) {}
$db = null;
?>
