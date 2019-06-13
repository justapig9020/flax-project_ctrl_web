<?php
if (!isset ($get_php)) {
    $get_php = 1;
    function get_Works ($pid, $wmon) {
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
            from work where project_id=:pid and 
            :wmon<=month(end) and :wmon>=month(start)";
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

    function get_Projs () {
/* arguments 
 * name | interview
 * -----|----------
 * prjs | array (array ("oid"=>$oid,"pname"=>$pname, "pid"=>$pid))
 * prj_exist | 1 exist , 0 not exist
 *
 * /

 /*projectunselect*/
        $db = str_con () ;
        $uid = $_SESSION["user"];
        if ($db) {
            //echo"連線成功</br>";
            $sel = "select do2.user_id as oid, 
            project.name as pname, 
            project.id as pid 
            from (do_proj as do1 inner join do_proj as do2 on do1.project_id = do2.project_id) 
            inner join project on project.id = do1.project_id 
            where do1.user_id = :uid and do2.status = 1;";
            try{
                $ins = $db->prepare ($sel) ;
                if ($ins) {
                    $ins->bindParam (':uid',$uid) ;
                    $result = $ins->execute () ;
                    if ($result) {
                        $prjs = $ins->fetchall (PDO::FETCH_ASSOC) ;
                    }else{
                        $error = $ins->errorInfo () ;
                    }
                }
            }catch (PDOException$e) {}
            $result = null;
            $row = null;
            $db = null;
        }
        return $prjs;
    }

    function get_Files ($pid) {
        $mems = null;
        $db = str_con ();
        $uid = $_SESSION["user"];
        $sel = "select own_id as oid, name as fname, time as ftime, intr as fintr, premission as fpre from file where project_id=:pid";
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
