<?php

/* arguments 
 * name | interview
 * -----|----------
 * prjs | array (array ("oid"=>$oid,"pname"=>$pname, "pid"=>$pid))
 * prj_exist | 1 exist , 0 not exist
 *
 * /

/*projectunselect*/
$prj_exist = 1;
$db = str_con () ;
$uid = $_SESSION["user"];
if ($db) {
    //echo"連線成功</br>";
    $sel = "select do1.user_id as search_id, do2.user_id as oid, project.name as pname from (do_proj as do1 inner join do_proj as do2 on do1.project_id = do2.project_id) inner join project on project.id = do1.project_id where do1.user_id = :uid and do2.status = 0;";
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
    if (!$prjs) {
        $prj_exist = 0;
    }
    /*show selectable projects*/

    /*foreach ($rows as $row) {
        foreach ($row as $key => $value) {
            if ($key&1) 
            echo"<ahref = \"project.php?oid = ".$buf."&pname = ".$value."\">".$buf."/".$value."</a></br>";
            else
            $buf = $value;
        }
    }*/
    $result = null;
    $row = null;
    $db = null;
}
?>
