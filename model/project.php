<?php
include("../include/network.php");
if (!checkIn()) {
    header("location:../main/index.php");
}
include("../include/sql.php");
	$page = "overview";
	include("share/_headerIn.php");
        $uid = $_SESSION["user"];
    
        if (isset($_GET["oid"]) and isset($_GET["pname"])) {
            /*        select project       */
			if (!isset($_SESSION["oid"]) 
			or !isset($_SESSION["pname"]) 
			or $_SESSION["oid"]!=$_GET["oid"] 
			or $_SESSION["pname"]!=$_GET["pname"]) {
				$_SESSION["oid"] = $_GET["oid"];
				$_SESSION["pname"] = $_GET["pname"];
				$_SESSION["pid"]= get_pid($_SESSION["pname"],$_SESSION["oid"]);
                //$_SESSION["pid"]= get_pid('prj,40543213);
			}
            if (isset($_GET["sfile"]))
            {
                $sfile = $_GET["sfile"];
            }
            $oid = $_SESSION["oid"];
			$pname = $_SESSION["pname"];
			$pid = $_SESSION["pid"];
            $uid = $_SESSION["user"];
            $retMesse="";
            /*
            echo $oid."</br>";
			echo $pname."</br>";
			echo $_SESSION["pid"]."</br>";
            echo $uid."</br>";
            */
            if (isset($_POST["fsubmit"])) {
				/*       new file       */
				//echo "</br>upload</br>";
				$fname = $_FILES["pfile"]["name"];	
				$db = str_con();
				if ($db){
				//echo "連線成功</br>";
					$sel =  "select * from file where own_id=:oid and project_id = :pid and name=:fname";
					try {
						$ins = $db->prepare($sel); 
						if($ins){
							$ins->bindParam(':oid',$oid);
							$ins->bindParam(':pid',$pid);
							$ins->bindParam(':fname',$fname);
							$result = $ins->execute();
							if($result){
								$row = $ins->fetch(PDO::FETCH_ASSOC);
							}else{
								$error = $ins->errorInfo();
								//echo "查詢失敗".$error[2];
							}
						}
					} catch (PDOException $e){
							
					}
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
                    } catch (PDOException $e){
                        //echo $e."</br>";
                    }
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
                    } catch (PDOException $e){
                       // echo $e."</br>";
                    }
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
			if ($db){
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
                                //echo "查詢失敗".$error[2];
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
		} else {
			/*      project unselect     */
			$db = str_con();
			if ($db){
				//echo "連線成功</br>";
				$sel = "select do_proj.user_id as oid,project.name as pname from project,(select project_id from do_proj where user_id = :uid) as used,do_proj where project.id=used.project_id and do_proj.project_id=project.id and status=0;";
				try {
					$ins = $db->prepare($sel); 
					if($ins){
						$ins->bindParam(':uid',$uid);
						$result = $ins->execute();
						if($result){
								$rows = $ins->fetchall(PDO::FETCH_NUM);
						}else{
							$error = $ins->errorInfo();
							//echo "查詢失敗".$error[2];
						}
					}
				} catch (PDOException $e){}
				if(!$rows){
					echo "尚無專案</br>";
					echo "<a href=\"newProject.php\">點此新增專案</a></br>";
				}else{
					/*show selectable projects*/
					foreach ($rows as $row) {
						foreach ($row as $key=>$value) {
							if ($key&1)
								echo "<a href=\"project.php?oid=".$buf."&pname=".$value."\">".$buf."/".$value."</a></br>";
								//echo $key.": ".$value."</br>";
							else 
								$buf = $value;
						}
					}
				}
			$result=null;
			$row=null;
			$db=null;
			}
        }
?>
