<?php
    include("dbconf.php");
	function str_con () {
		try {
			$db = new PDO('mysql:host=localhost;dbname=project_ctrl;charsetutf8',getDBUser(),getDBPw());
		} catch (\PDOException $e) {
			//echo "Error: ".$e."</br>";
			return null;
		} 	
		return $db;
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
?>
