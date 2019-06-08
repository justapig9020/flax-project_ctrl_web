<?php
if (!isset ($get_php)) {
    $get_php = 1;
    function get_Works ($pid, $wmon) {
        $works = null;
        $db = str_con ();
        $uid = $_SESSION["user"];
        $sel = "select name as wname, date_format(start,'%Y') as wstarty, date_format(start,'%m') as wstartm, date_format(start,'%d') as wstartd, date_format(end,'%Y') as wendy,  date_format(end,'%m') as wendm, date_format(end,'%d') as wendd, intr as wintr from work where project_id=:pid and :wmon<=month(end) adn :wmon>=month(start)";
        try {
            $ins = $db->prepare ($sel);
            if ($ins) {
                $ins->bindParam (':pid', $pid);
                $ins->bindParam (':wmon', $wmon);
                $result = $ins->execute ();
                if ($result) {
                    $works = $ins->fetchAll (PDO::FETCH_ASSOC);
                }
            }
        } catch (PDOException $e) {}
        $db = null;
        return $works;
    }

    function get_Mems ($pid) {
        $mems = null;
        $db = str_con ();
        $sel = "select user_id as uid, status from do_proj where project_id=:pid order by status DESC";
        try {
            $ins = $db->prepare ($sel);
            if ($ins) {
                $ins->bindParam (':pid', $pid);
                $result = $ins->execute ();
                if ($result) {
                    $mems = $ins->fetchAll (PDO::FETCH_ASSOC);
                }
            }
        } catch (PDOException $e) {}
        $db = null;
        return $mems;
    }
    function get_Files ($pid) {
        $mems = null;
        $db = str_con ();
        $uid = $_SESSION["user"];
        $sel = "select own_id as wid, name as fname, time as ftime, intr as fintr, premission as fpre from file where project_id=:pid";
        try {
            $ins = $db->prepare ($sel);
            if ($ins) {
                $ins->bindParam (':pid', $pid);
                $result = $ins->execute ();
                if ($result) {
                    $files = $ins->fetchAll (PDO::FETCH_ASSOC);
                }
            }
        } catch (PDOException $e) {}
        $db = null;
        return $files;
    }
    function get_Pname ($pid) {
        $mems = null;
        $db = str_con ();
        $uid = $_SESSION["user"];
        $sel = "select name from project where id = :pid";
        try {
            $ins = $db->prepare ($sel);
            if ($ins) {
                $ins->bindParam (':pid', $pid);
                $result = $ins->execute ();
                if ($result) {
                    $row = $ins->fetch (PDO::FETCH_ASSOC);
                }
            }
        } catch (PDOException $e) {}
        $pname = $row["name"];
        $db = null;
        return $pname;
    }
}
?>