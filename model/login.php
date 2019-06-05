<?php
//echo __DIR__;

include("../include/sql.php");
$retMesse = "";
if(isset($_POST['id']) and isset($_POST['pw']))
{
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $db = str_con();
	if ($db){
		//echo "連線成功</br>";
		$sel = "select * from user where account = :id";
        try {
			$ins = $db->prepare($sel); 
			if($ins){
				$ins->bindParam(':id',$id);
				$result = $ins->execute();
				if($result){
					$row = $ins->fetch(PDO::FETCH_ASSOC);
				}else{
					$error = $ins->errorInfo();
				}
			}
		} catch (PDOException $e){
			
		}
		if(!$row){
			$retMesse = "無此帳號";
		}else{
			$key = hash('sha256',$pw);
			if($row["pw"]==$key){
                $_SESSION["user"] = $row["id"];
                $_SESSION["ip"] = getIp();
				header("location:./overView.php");
                //$retMesse = "登入成功";
			}else{
				$retMesse = "密碼錯誤";
			}
		}
		$db=null;
	}else{
		echo "資料庫無法連線 請聯絡管理員</br>";
	}	
}
?>

