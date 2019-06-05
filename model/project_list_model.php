<?php

/* arguments 
 * name | interview
 * -----|----------
 * prjs | array (array ("oid"=>$oid,"pname"=>$pname))
 * prj_exist | 1 exist , 0 not exist
 *
 * /

/*projectunselect*/
$prj_exist = 1;
$db = str_con () ;
if ($db) {
    //echo"連線成功</br>";
    $sel = "select do_proj.user_id as oid,project.name as pname from project, (select project_id from do_proj where user_id = :uid) as used,do_proj where project.id = used.project_id and do_proj.project_id = project.id and status = 0;";
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
    } else {
        $prj_exist = 1;
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
