<?php
if (isset ($_POST["wmon"])) { // select sork month
    $wmon = $_POST["wmon"];
} else {
    $wmon = (int) date('m', strtotime('-0 month'));
}
$works = null;
$db = str_con ();
$uid = $_SESSION["user"];
$sel = "select name as wname, start as wstart, end as wend, intr as wintr from work where project_id=:pid and :wmon<=month(end) adn :wmon>=month(start)";
try {
    $ins = $db->prepare ($sel);
    if ($ins) {
        $ins->bindParam (':pid', $pid);
        $result = $ins->execute ();
        if ($result) {
            $works = $ins->fetch (PDO::FETCH_ASSOC);
        }
} catch (PDOException $e) {}
$db = null;
?>
