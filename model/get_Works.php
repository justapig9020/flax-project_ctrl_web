<?php
if (isset ($_POST["wmon"])) { // select sork month
    $wmon = $_POST["wmon"];
} else {
    $wmon = (int) date('m', strtotime('-0 month'));
}
$works = null;
$db = str_con ();
$uid = $_SESSION["user"];
$sel = "select name as wname, date_format(start,'%Y') as wstarty, date_format(start,'%m') as wstartm, date_format(start,'%d') as wstartd, date_format(end,'%Y') as wendy,  date_format(end,'%m') as wendm, date_format(end,'%d') as wendd, intr as wintr from work where project_id=:pid and :wmon<=month(end) adn :wmon>=month(start)";
try {
    $ins = $db->prepare ($sel);
    if ($ins) {
        $ins->bindParam (':pid', $pid);
        $result = $ins->execute ();
        if ($result) {
            $works = $ins->fetchAll (PDO::FETCH_ASSOC);
        }
} catch (PDOException $e) {}
$db = null;
?>
