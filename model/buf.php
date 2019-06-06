if (isset($_POST["fsubmit"])) {
    $fname = $_FILES["pfile"]["name"];	
    $db = str_con ();
    if ($db) {
        $sel =  "select * from file where own_id=:oid and project_id = :pid and name=:fname";
        try {
            $ins = $db->prepare ($sel); 
            if ($ins) {
                $ins->bindParam (':oid',$oid);
                $ins->bindParam (':pid',$pid);
                $ins->bindParam (':fname',$fname);
                $result = $ins->execute ();
                if ($result) {
                    $row = $ins->fetch (PDO::FETCH_ASSOC);
                } else {
                    $error = $ins->errorInfo ();
                }
            }
        } catch (PDOException $e) {}
            if($row){
                /*   old file   */
                $retMesse .="更新專案: ";
                $do = 8;
                if (!($row["premission"]&$do) and $row["own_id"]!=$uid
                    and get_premission($pname,$oid,$uid))
                    goto denied;
                }else{
                /*   new file   */
                    $retMesse .="新增專案: ";
                    $do = 0;
                }
                /* insert into file */
                $sel =  "insert into file 
                        (name,own_id,project_id) 
                        value 
                        (:fname,:oid,:pid)";
                try {      
                    $ins = $db->prepare($sel); 
                    if($ins){     
                        $ins->bindParam(':oid',$oid);
                        $ins->bindParam(':pid',$pid);
                        $ins->bindParam(':fname',$fname);
                        $ins->execute();
                    }
                } catch (PDOException $e){}
                /* log who modify it */
                $sel =  "insert into modify 
                        (proj_id,file_name,user_id,do) 
                        value 
                        (:pid,:fname,:uid,:do)";
                try {      
                    $ins = $db->prepare($sel); 
                    if($ins){
                        $ins->bindParam(':do',$do);
                        $ins->bindParam(':uid',$uid);
                        $ins->bindParam(':pid',$pid);
                        $ins->bindParam(':fname',$fname);
                        $ins->execute();
                    }
                } catch (PDOException $e){}
                move_uploaded_file ($_FILES["pfile"]["tmp_name"], "users/".$oid."/".$pname."/".$_FILES["pfile"]["name"]);
                goto fini;
            denied:
                $retMesse .="權限不足";
            fini:
                $result=null;
                $row=null;
                $db=null;
            }
        } else if (isset($_POST["usubmit"])) {
        /*       new member       */
            echo "</br>new user</br>";
        }    
        echo "Project: ".$oid."/".$pname."</br>";
        echo $retMesse."</br><form method=\"post\" enctype=\"multipart/form-data\">
	    <input type=\"file\" name=\"pfile\" id=\"pfile\">
		<input type=\"submit\" name=\"fsubmit\" id=\"fsubmit\" value=\"上傳\">
		</form>";
        if (!get_premission($pname,$oid,$uid))
            echo "<form method=\"post\" >
			    新增成員: <input type=\"text\" name=\"nuser\" id=\"nuser\">
			    <input type=\"submit\" name=\"usubmit\" id=\"usubmit\" value=\"新增\">
			    </form>";
            /* show files */
        $db = str_con();
        if ($db) {
            $sel = "select name from file where project_id=:pid";
            try {
                $ins = $db->prepare($sel); 
                if($ins){
                    $ins->bindParam(':pid',$pid);
                    $result = $ins->execute();
                    if($result){
                        $rows = $ins->fetchall(PDO::FETCH_NUM);
                    }else{
                        $error = $ins->errorInfo();
                    }
                }
            } catch (PDOException $e){}
            if(!$rows){
                echo "尚無檔案</br>";
            }else{
                /*show selectable projects*/
                $i=1;
                foreach ($rows as $row) {
                    foreach ($row as $key=>$value)
                    {   
                        echo $i."  ".$value;
                        if (isset($sfile) and
                            $sfile==$value)
                            echo "<a href=\"project.php?oid=".$oid."&pname=".$pname."\">   
                                -</a></br>selected</br></br>";
                        else 
                            echo "<a href=\"project.php?oid=".$oid."&pname=".$pname."&sfile=".$value."\"> +</a></br>";
                        $i++;
                    }
                }
            }
        $result=null;
        $row=null;
        $db=null;
    }
} 
?
