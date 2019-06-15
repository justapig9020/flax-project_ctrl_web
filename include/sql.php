<?php
if (!isset ($__SQL__)) {
    $__SQL__ = 1;
    include("dbconf.php");
    /* connect to database*/
	function str_con () {
        try {
            $conf = sprintf('mysql:host=localhost;dbname=project_ctrl;charsetutf8;port=%d;',getDBPort());
            //echo $conf;
            $db = new PDO($conf,getDBUser(),getDBPw());
		} catch (PDOException $e) {
			echo "Error: ".$e."</br>";
            //return null;
            exit();
		} 	
		return $db;
    }
    function get_poid ($pid)
	{
		$db = str_con();
        //echo "in func</br>";
        $retV=NULL;
		if ($db){
			//echo "連線成功</br>";
			$sel = "select user_id as oid from do_proj where project_id = :pid and status = 1";
			try {
				$ins = $db->prepare($sel); 
				if($ins){
					$ins->bindParam(':pid',$pid);
					$result = $ins->execute();
					if($result){
							$row = $ins->fetchall(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
					}
				}
			} catch (PDOException $e){
				
			}
			if(!$row){
				$retM = "無此專案";
			}else{
				//echo count($row);
				//$row as $key=>$value;
				$retV = $row[0]["oid"];
			}
		$result=null;
		$row=null;
		$db=null;
		}
        //echo "in fun: ".$retV."</br>";
		return $retV;
    }
    function get_pid ($pname,$oid)
	{
		$db = str_con();
        //echo "in func</br>";
        $retV=NULL;
		if ($db){
			//echo "連線成功</br>";
			$sel = "select project.id as id from project inner join do_proj on id=project_id where name=:pname and user_id=:oid and status=0";
			try {
				$ins = $db->prepare($sel); 
				if($ins){
					$ins->bindParam(':oid',$oid);
					$ins->bindParam(':pname',$pname);
					$result = $ins->execute();
					if($result){
							$row = $ins->fetchall(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
					}
				}
			} catch (PDOException $e){
				
			}
			if(!$row){
				$retM = "無此專案";
			}else{
				//echo count($row);
				//$row as $key=>$value;
				$retV = $row[0]["id"];
			}
		$result=null;
		$row=null;
		$db=null;
		}
        //echo "in fun: ".$retV."</br>";
		return $retV;
    }

    function doing_proj ($uid, $pid) {
        $ret = 0;
        $db = str_con();
        if ($db){
            $sel = "select * from do_proj where user_id=:uid and project_id=:pid";  
            try {
				$ins = $db->prepare($sel); 
                if($ins){
					$ins->bindParam(':uid',$uid);
					$ins->bindParam(':pid',$pid);
                    $result = $ins->execute();
					if($result){
							$status = $ins->fetch(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
                    }
                    if ($status) 
                        $ret = 1;
                }
            } catch (PDOException $e){}
        }
        return $ret;
    }

    function new_file ($fname, $uid, $pid) 
    {
        $db = str_con();
        //echo "in func</br>";
        $retMess=-2;
        if ($db){
            $sel = "select status from do_proj where user_id=:uid and project_id=:pid";  
            try {
				$ins = $db->prepare($sel); 
                if($ins){
					$ins->bindParam(':uid',$uid);
					$ins->bindParam(':pid',$pid);
                    $result = $ins->execute();
					if($result){
							$status = $ins->fetch(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
                    }
                }
            } catch (PDOException $e){}
            if ($status) {
                $dst = $status["status"];
                //echo "連線成功</br>";
                $sel = "select id, own_id, premission from file where name=:fname and project_id=:pid";  
                try {
				    $ins = $db->prepare($sel); 
                    if($ins){
				    $ins->bindParam(':fname',$fname);
				    $ins->bindParam(':pid',$pid);
                        $result = $ins->execute();
                        if($result){
						    $row = $ins->fetch(PDO::FETCH_ASSOC);
					    }else{
						    $error = $ins->errorInfo();
                        }
                    }
                } catch (PDOException $e){}
                /*file exiet check premission*/    
                if ($row) {
                    $fid = $row["id"];
                    $oid = $row["own_id"];
                    $fpre = $row["premission"];
                    if ($uid == $oid || $dst == 1) {
                        $sel = "insert into modify
                                (file_id, user_id, do) 
                                value 
                                (:fid, :uid, 1)";
                        try {
				            $ins = $db->prepare($sel); 
        		            if($ins){
                                $ins->bindParam(':fid', $fid);
					            $ins->bindParam(':uid',$uid);
                                $ins->execute();
                                $retMess = 1;
                            }
                        } catch (PDOException $e){}
                    } else if ($dst == 0) {
                        if (fpre&0x8) {
                            $sel = "insert into modify
                                    (file_id, user_id, do) 
                                    value 
                                    (:fid, uid, 1)";
                            try {
				                $ins = $db->prepare($sel); 
        		                if($ins){
                                    $ins->bindParam(':pname', $pname);
    					            $ins->bindParam(':pintr',$pintr);
                                    $ins->execute();
                                    $retMess = 1;// 更新檔案
                                }
                            } catch (PDOException $e){}
                        }else {
                            $retMess = 0;
                        }
                    } else {
                        $retMess = 0;
                    }
                } else {
                    $sel = "insert into file
                            (name, project_id, own_id) 
                            value 
                            (:fname, :pid, :uid)";
                    try {
				        $ins = $db->prepare($sel); 
        		        if($ins){
                            $ins->bindParam(':fname', $fname);
					        $ins->bindParam(':pid',$pid);
					        $ins->bindParam(':uid',$uid);
                            $ins->execute();
                        }
                    } catch (PDOException $e){}
                    $sel = "SELECT LAST_INSERT_ID()";
                    try {
			            $ins = $db->prepare($sel); 
        	            if($ins){
                            $result = $ins->execute();
                            if($result){
						        $getId = $ins->fetch(PDO::FETCH_NUM);
					        }else{
						        $error = $ins->errorInfo();
                            }
                        }
                        $fid = $getId[0];
                    } catch (PDOException $e){}
                    $sel = "insert into modify
                            (file_id, user_id, do) 
                            value 
                            (:fid, :uid, 0)";
                    try {
			            $ins = $db->prepare($sel); 
        	            if($ins){
                            $ins->bindParam(':fid', $fid);
		    			    $ins->bindParam(':uid',$uid);
                            $ins->execute();
                        }
                        $retMess = 2; //create a new file done
                    } catch (PDOException $e){}
                }
            } else {
                $retMess = -1;
            }
        }   else {
            $retMess = -3;
        }
		$db=null;
		return $retMess;
    }

    function new_proj ($pname, $pintr, $uid)
    {
        $db = str_con();
        //echo "in func</br>";
        $retMess=NULL;
		if ($db){
            //echo "連線成功</br>";
            $sel = "select * from project inner join do_proj on project.id = do_proj.project_id and do_proj.status = 1 where project.name = :pname and do_proj.user_id = :uid";
            try {
				$ins = $db->prepare($sel); 
                if($ins){
					$ins->bindParam(':uid',$uid);
					$ins->bindParam(':pname',$pname);
                    $result = $ins->execute();
					if($result){
							$rows = $ins->fetch(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
                    }
                }
            } catch (PDOException $e){}
            /*echo "hello world</br>";    
            echo gettype ($rows);
            foreach ($rows as $key=>$value) {
                echo $key."/".$value;
            }*/
            if (!$rows) {
                $sel = "insert into project
                        (name, intr) 
                        value 
                        (:pname, :pintr)";
			    try {
				    $ins = $db->prepare($sel); 
				    if($ins){
                        $ins->bindParam(':pname', $pname);
					    $ins->bindParam(':pintr',$pintr);
                        $ins->execute();
                    }
                } catch (PDOException $e){}
                $sel = "select last_insert_id()";
                try {
				    $ins = $db->prepare($sel); 
                    if($ins){
                        $result = $ins->execute();
		    			if($result){
			    				$getPid = $ins->fetch(PDO::FETCH_NUM);
			    		}else{
			    			$error = $ins->errorInfo();
			    			//echo "查詢失敗".$error[2];
                        }
                    }
                } catch (PDOException $e){}
                $pid = $getPid[0];
                $sel = "insert into do_proj
                        (user_id, project_id, status) 
                        value 
                        (:uid, :pid , 1)";
			    try {
                    $ins = $db->prepare($sel); 
                    if($ins){
                        $ins->bindParam(':uid', $uid);
					    $ins->bindParam(':pid',$pid);
                        $ins->execute();
                    }
                } catch (PDOException $e){}
                $ndir = sprintf ("mkdir \"users/%s/%s\\\"",$uid,$pname);
                echo shell_exec ($ndir);
                $retMess = "專案新增完成";
                header ("location:./project.php");
            } else {
                $retMess = "專案已存在"; 
            } 
		}
        //echo "in fun: ".$retV."</br>";
		$db=null;
		return $retMess;


    }
    function rm_mem ($duid, $uid, $pid) {
        $db = str_con();
        $retMess=NULL;
		if ($db){
            //echo "連線成功</br>";
            $sel = "select status from do_proj where user_id=:uid and project_id = :pid";
            try {
				$ins = $db->prepare($sel); 
                if($ins){
					$ins->bindParam(':uid',$uid);
					$ins->bindParam(':pid',$pid);
                    $result = $ins->execute();
					if($result){
							$row = $ins->fetch(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
                    }
                }
                if ($row && $row["status"]==1) {
                    $sel = "delete from do_proj where project_id = :pid and user_id = :duid"; 
                    $ins = $db->prepare($sel); 
                    if($ins){
					    $ins->bindParam(':duid',$duid);
					    $ins->bindParam(':pid',$pid);
                        $result = $ins->execute();
                    }
                }
            } catch (PDOException $e){}
        }
    }
    function rm_Proj ($uid, $pid) {
        $db = str_con();
        //echo "in func</br>";
        $retMess=NULL;
		if ($db){
            //echo "連線成功</br>";
            $sel = "select do_proj.status,project.name as pname from do_proj inner join project on do_proj.project_id = project.id where project_id = :pid and user_id = :uid";
            try {
				$ins = $db->prepare($sel); 
                if($ins){
					$ins->bindParam(':uid',$uid);
					$ins->bindParam(':pid',$pid);
                    $result = $ins->execute();
					if($result){
							$row = $ins->fetch(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
                    }
                }
            } catch (PDOException $e){}
            if ($row) {
                $pname=$row["pname"];
                if ($row["status"] == 1) {
                    $sel = "delete from do_proj
                            where project_id = :pid";
		    	    try {
	    			    $ins = $db->prepare($sel); 
    				    if($ins){
			    		    $ins->bindParam(':pid',$pid);
                            $ins->execute();
                        }else{
                            echo "insert error";
                        }
                    } catch (PDOException $e){}
                        
                    $sel = "delete from work
                            where project_id = :pid";
		    	    try {
	    			    $ins = $db->prepare($sel); 
    				    if($ins){
			    		    $ins->bindParam(':pid',$pid);
                            $ins->execute();
                        }else{
                            echo "insert error";
                        }
                    } catch (PDOException $e){}
                        
                    $sel = "delete from modify
                            where file_id in (select id from file where project_id = :pid)";
		    	    try {
	    			    $ins = $db->prepare($sel); 
    				    if($ins){
			    		    $ins->bindParam(':pid',$pid);
                            $ins->execute();
                        }else{
                            echo "insert error";
                        }
                    } catch (PDOException $e){}
                        
                    $sel = "delete from file
                            where project_id = :pid";
		    	    try {
	    			    $ins = $db->prepare($sel); 
    				    if($ins){
			    		    $ins->bindParam(':pid',$pid);
                            $ins->execute();
                        }else{
                            echo "insert error";
                        }
                    } catch (PDOException $e){}

                    $sel = "delete from project
                            where id = :pid";
		    	    try {
	    			    $ins = $db->prepare($sel); 
    				    if($ins){
			    		    $ins->bindParam(':pid',$pid);
                            $ins->execute();
                        }else{
                            echo "insert error";
                        }
                    } catch (PDOException $e){}
                } else {
                    $sel = "delete from do_proj
                            where project_id = :pid and user_id = :uid";
		    	    try {
	    			    $ins = $db->prepare($sel); 
    				    if($ins){
                            $ins->bindParam(':pid',$pid);
                            $ins->bindParam(':uid',$uid);
                            $ins->execute();
                        }else{
                            echo "insert error";
                        }
                    } catch (PDOException $e){}
                }
                $rd = sprintf ("rd/s/q \"users/%s/%s\\\"",$uid,$pname);
                //echo $rd;
                shell_exec ($rd);
                //rd/s/q
            } else {
                
            } 
		}
        //echo "in fun: ".$retV."</br>";
		$db=null;
    }
        
    function new_Mem ($uid, $pid)
    {
        $db = str_con();
        //echo "in func</br>";
        $retMess=NULL;
		if ($db){
            //echo "連線成功</br>";
            $sel = "select * from do_proj where project_id = :pid and user_id = :uid";
            try {
				$ins = $db->prepare($sel); 
                if($ins){
					$ins->bindParam(':uid',$uid);
					$ins->bindParam(':pid',$pid);
                    $result = $ins->execute();
					if($result){
							$row = $ins->fetchall(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
                    }
                }
            } catch (PDOException $e){}
            if (!$row) {
                $sel = "insert into do_proj
                        (user_id, project_id, status) 
                        value 
                        (:uid, :pid , 0)";
			    try {
				    $ins = $db->prepare($sel); 
				    if($ins){
                        $ins->bindParam(':uid', $uid);
					    $ins->bindParam(':pid',$pid);
                        $ins->execute();
                    }else{
                        echo "insert error";
                    }
                } catch (PDOException $e){}
                $retMess = "成員新增完成";
            } else {
                $retMess = "成員已存在"; 
            } 
		}
        //echo "in fun: ".$retV."</br>";
		$db=null;
		return $retMess;

    }
        
    function new_Tea ($tid, $pid)
    {
        $db = str_con();
        //echo "in func</br>";
        $retMess=NULL;
		if ($db){
            //echo "連線成功</br>";
            $sel = "select * from do_proj where project_id = :pid and status = 2";
            try {
				$ins = $db->prepare($sel); 
				if($ins){
					$ins->bindParam(':pid',$pid);
                    $result = $ins->execute();
					if($result){
							$row = $ins->fetchall(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
                    }
                }
            } catch (PDOException $e){}
            if (!$row) {
                $sel = "insert into do_proj
                        (user_id, project_id, status) 
                        value 
                        (:tid, :pid , 2)";
			    try {
				    $ins = $db->prepare($sel); 
				    if($ins){
                        $ins->bindParam(':tid', $tid);
					    $ins->bindParam(':pid',$pid);
                        $ins->execute();
                    }
                } catch (PDOException $e){}
                $retMess = "教授新增完成";
            } else {
                $retMess = "教授已存在"; 
            } 
		}
        //echo "in fun: ".$retV."</br>";
		$db=null;
		return $retMess;
    }
    
    function new_work ($wname, $wstart, $wend, $wintr, $pid)
    {
        $db = str_con();
        //echo "in func</br>";
        $retMess=NULL;
		if ($db){
            //echo "連線成功</br>";
            $sel = "select * from work where name = :wname and start = :wstart and end = :wend and project_id = :pid";
            try {
				$ins = $db->prepare($sel); 
				if($ins){
                    $ins->bindParam(':wname', $wname);
                    $ins->bindParam(':wstart', $wstart);
                    $ins->bindParam(':wend', $wend);
					$ins->bindParam(':pid',$pid);
                    $result = $ins->execute();
					if($result){
							$row = $ins->fetchall(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
                    }
                }
            } catch (PDOException $e){}
            if (!$row) {
                $sel = "insert into work 
                        (name, start, end, project_id, intr)
                        value 
                        (:wname, :wstart, :wend, :pid, :wintr)";
			    try {
				    $ins = $db->prepare($sel); 
				    if($ins){
                        $ins->bindParam(':wname', $wname);
                        $ins->bindParam(':wstart', $wstart);
                        $ins->bindParam(':wend', $wend);
                        $ins->bindParam(':wintr', $wintr);
					    $ins->bindParam(':pid',$pid);
                        $ins->execute();
                    }
                } catch (PDOException $e){}
                $retMess = "工作新增完成";
            } else {
                $retMess = "工作已存在"; 
            } 
		}
        //echo "in fun: ".$retV."</br>";
		$db=null;
		return $retMess;
    }
    
    function get_mo ($pid, $uid, $mid)
    {
        /*
         *  mid
         *  muid
         *  mdo
         *  mfname
         *  mpoid
         *  mpname
         *  mtime
         *  
         */
        $row = NULL;
        $db = str_con();
        $retV=NULL;
		if ($db){
			//echo "連線成功</br>";
            $sel = "select do1.user_id as mpoid,
                    project.name as mpname, 
                    file.name as mfname, 
                    modify.user_id as muid, 
                    modify.time as mtime, 
                    modify.do as mdo, 
                    modify.id as mid 
                    from project 
                    inner join do_proj as do1 
                    on do1.project_id = project.id and 
                    do1.status = 1 
                    inner join file on 
                    file.project_id = project.id 
                    inner join modify on 
                    modify.file_id = file.id 
                    where project.id in 
                    (select project_id from 
                    do_proj where user_id = :uid) " ;
                    
            if ($mid != 0)
                $sel = $sel."and modify.id < :mid";
            if ($pid != 0)
                $sel = $sel."and project.id = :pid"; 
            $sel = $sel." order by modify.id DESC limit 10;";
            try {
				$ins = $db->prepare($sel); 
                if($ins){
                    if ($mid != 0) {
                        //echo $sel."</br>";
                       //echo $mid."</br>";
                        $ins->bindParam(':mid',$mid);
                    }   
                    if ($pid != 0)
					    $ins->bindParam(':pid',$pid);
					$ins->bindParam(':uid',$uid);
                    $result = $ins->execute();
                    if($result){
					    $row = $ins->fetchall(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
					}
				}
			} catch (PDOException $e){
				
			}
		$result=null;
		$db=null;
		}
        //echo "in fun: ".$retV."</br>";
		return $row;
    }

    function get_premission ($pname,$oid,$uid)
	{
		$db = str_con();
        //echo "in func</br>";
        $retV=NULL;
        $pid = get_pid ($pname,$oid);
		if ($db){
			//echo "連線成功</br>";
			$sel = "select status from do_proj where user_id=:uid and project_id = :pid";
			try {
				$ins = $db->prepare($sel); 
				if($ins){
					$ins->bindParam(':uid',$uid);
					$ins->bindParam(':pid',$pid);
					$result = $ins->execute();
					if($result){
							$row = $ins->fetchall(PDO::FETCH_ASSOC);
					}else{
						$error = $ins->errorInfo();
						//echo "查詢失敗".$error[2];
					}
				}
			} catch (PDOException $e){
				
			}
			if(!$row){
				$retM = "無參與專案";
			}else{
				//echo count($row);
				//$row as $key=>$value;
				$retV = $row[0]["status"];
			}
		$result=null;
		$row=null;
		$db=null;
		}
        //echo "in fun: ".$retV."</br>";
		return $retV;
    }

    function show_files ($pid,$oid,$pname,$sfile){
        $db = str_con();
		if ($db){
            $sel = "select name,own_id,time from file where project_id=:pid";
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
                        foreach ($row as $key=>$value) {
                            switch ($key) {
                                case 0:
                                   $vname = $value;
                                break;
                                case 1:
                                    $vid = $value;
                                break;
                                case 2:
                                    echo $i." ".$vname." ".$vid." ".$value;
                                    if ($sfile==$vname) {
                                        echo "<a href=\"project.php?oid=".$oid."&pname=".$pname."\">
                                        <img src=\"image/minus.png\" height=\"10\" weight=\"10\"> 
                                        </a></br>";
                                        $sel = "select user_id as Modifier,mtime as Time,do as Do from modify where file_name=:fname and proj_id=:pid order by id desc limit 1;";
                                        try {
                                            $ins = $db->prepare($sel); 
                                            if($ins){
                                                $ins->bindParam(':pid',$pid);
                                                $ins->bindParam(':fname',$sfile);
                                                $result = $ins->execute();                 
                                                if($result){
                                                    $modis = $ins->fetchall(PDO::FETCH_ASSOC);
                                                }else{
                                                    $error = $ins->errorInfo();
                                                }
                                            }
                                        } catch (PDOException $e) {echo $e;}
                                        if ($modis) {
                                            foreach ($modis as $ms) {
                                                foreach ($ms as $k=>$v) {
                                                    if ($k=="Do"){
                                                        echo "Do: ";
                                                        switch ($v) {
                                                        case 0:
                                                            echo "Create";
                                                        break;
                                                        case 8:
                                                            echo "Modify";
                                                        break;
                                                        }
                                                    }else echo $k.": ".$v."</br>";
                                                }
                                            }
                                        }
                                        echo "</br>";
                                    } else { 
                                        echo "<a href=\"project.php?oid=".$oid."&pname=".$pname."&sfile=".$vname."\"> <img src=\"image/plus.png\" height=\"10\" weight=\"10\"></a></br>";
                                    }
                                    $i++;
                                break;
                            }
                        }
                    }
                }
            $result=null;
            $row=null;
            $db=null;
        }
    }
}   
?>
