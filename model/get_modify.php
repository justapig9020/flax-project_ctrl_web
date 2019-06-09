<?php
if (isset ($_POST["pid"]) and
    isset ($_POST["wmon"])) {
        $pid = $_POST["pid"];
        $wmon = $_POST["wmon"];
        $works = null;
        $db = str_con ();
        $uid = $_SESSION["user"];
        $sel = "select name as wname, 
            date_format(start,'%Y') as wstarty, 
            date_format(start,'%m') as wstartm, 
            date_format(start,'%d') as wstartd, 
            date_format(end,'%Y') as wendy,  
            date_format(end,'%m') as wendm, 
            date_format(end,'%d') as wendd, 
            intr as wintr 
            from work where";
        if ($pid != 0)    
            $sel = $sel."project_id=:pid and";
        else 
            $sel = $sel."project_id in 
                        (select project_id from 
                        do_proj where user_id = :uid)";
        $sel = $sel.":wmon<=month(end) and 
            :wmon>=month(start)";
        try {
            $ins = $db->prepare ($sel);
            if ($ins) {
                if ($pid != 0)
                    $ins->bindParam (':pid', $pid);
                else 
                    $ins->bindParam (':uid', $uid);
                $ins->bindParam (':wmon', $wmon);
                   $result = $ins->execute ();
                if ($result) {
                    $works = $ins->fetchAll (PDO::FETCH_ASSOC);
                }
            }
        } catch (PDOException $e) {}
        $db = null;
    echo json_encode($works);
}
?>
