<?php
//echo __DIR__;
include("connect.php");
$ret = "";
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
					//echo "查詢失敗".$error[2];
				}
			}
		} catch (PDOException $e){
			
		}
		if(!$row){
			$ret = "無此帳號";
		}else{
			$key = hash('sha256',$pw);
			if($row["pw"]==$key){
				//session_start();
				$_SESSION["user"] = $row["id"];
                //$ind = ""
				header("location:../index.php");
			}else{
				$ret = "密碼錯誤";
			}
		}
		$db=null;
	}else{
		echo "資料庫無法連線 請聯絡管理員</br>";
	}
	
}
?>
<form id="login" name="form1" method="post" action="">
	<font color="red"><?php echo $ret; ?></font></br>
	<label>
	帳號: <input type="text" name="id" /></br>
	</label>
	<label>
	密碼: <input type="password" name="pw" /></br>
	</label>
	<label>
	<input type="submit" value="登入" />
	</label>
	<!---<a href="./signUp.php">新增帳號</a>-->
</form>
