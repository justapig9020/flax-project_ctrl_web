<?php
/*        select project       */
$pid = $_GET["pid"];
if (isset($_GET["sfile"]))
{
    $sfile = $_GET["sfile"];
}
$db = str_con ();
$uid = $_SESSION["user"];
$sel = "select project.name as pname from project where id=:pid";
try {
    $ins = $db->prepare ($sel);
    if ($ins) {
        $ins->bindParam (':pid', $pid);
        $result = $ins->execute ();
        if ($result) {
            $row = $ins->fetch (PDO::FETCH_ASSOC);
        }
        if ($row) {
            $pname = $row["pname"];
            $sel = "select * from do_proj where project_id = :pid and user_id = :uid";
            $ins = $db->prepare ($sel);
            if ($ins) {
                $ins->bindParam (':pid', $pid);
                $ins->bindParam (':uid', $uid);
                $result = $ins->execute ();
                if ($result) {
                    $access_right = $ins->fetch (PDO::FETCH_ASSOC);
                }
                if (!$access_right) {
                    $db = null;
                    header ("location:./project.php");
                }
            }

            $sel = "select user_id from do_proj where project_id = :pid and status = 0";
            $ins = $db->prepare ($sel);
            if ($ins) {
                $ins->bindParam (':pid', $pid);
                $result = $ins->execute ();
                if ($result) {
                    $row = $ins->fetch (PDO::FETCH_ASSOC);
                }
                $oid = $row["user_id"];
            }
        } else {
            $retMesse = "無此專案";
            header ("location:./project.php");
        }
    }
} catch (PDOException $e) {}
#$oid = $_SESSION["oid"];
#$pname = $_SESSION["pname"];
$db = null;
?>


