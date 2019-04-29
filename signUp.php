<?php
include("include/connect.php");
$ret = "";
if(isset($_POST['id']) 
	and isset($_POST['pw']) 
	and isset($_POST['repw'])
	and isset($_POST['acc'])
	and isset($_POST['email'])
	and isset($_POST['name'])
	)
{
	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$repw = $_POST['repw'];
	$acc = $_POST['acc'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	if ($pw==$repw){
		if($id != "" and
		strlen($acc) > 5 and strlen($acc) < 26 and
		strlen($pw) >5 and strlen($pw) <26 and
		preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email) and $name != ""
		) {
			$db = str_con();
			if ($db){
				//echo "連線成功</br>";
				$sel = "select * from user where id=:id or account = :acc";
				try {
					$ins = $db->prepare($sel);
					if($ins){
						$ins->bindParam(':id',$id);
						$ins->bindParam(':acc',$acc);
						$result = $ins->execute();
						if($result){
							$row = $ins->fetch(PDO::FETCH_ASSOC);
						}else{
							$error = $ins->errorInfo();
							echo "查詢失敗".$error[2];
						}
					}
				}catch (PDOException $e){
					echo $e;
				}
				if(!$row){
					$sel = "insert into user (id,account,pw,email,name) values (:id,:acc,:pw,:ema,:name)";
					try {
						$ins = $db->prepare($sel); 
						if($ins){
							$key = hash('sha256',$pw);
							$ins->bindParam(':id',$id);
							$ins->bindParam(':pw',$key);
							$ins->bindParam(':acc',$acc);
							$ins->bindParam(':ema',$email);
							$ins->bindParam(':name',$name);
							$ins->execute();
						}
					} catch (PDOException $e){
						
					}
					$ndir = sprintf("xcopy newuser  %d\\",$id);
					shell_exec($ndir);
					$ret = "完成";
				}else{
					$ret = "使用者已存在";
				}
				$db=null;
			}else{
				echo "資料庫無法連線 請聯絡管理員</br>";
			}
		} else {
			$ret = "請按照規則輸入";
		}
	}else{
		$ret = "重複輸入密碼錯誤";
	}
}

//$result = shell_exec('mkdir test');
?>

<html>
<head>
	<?php
		include("share/head.php");
	?>
</head>
<body>
	<?php
	include("share/_header.php");
	?>
	<form id="login" name="form1" method="post" action="">
		<font color="red"><?php echo $ret; ?></font></br>
		<label>
		輸入學號: <input type="text" name="id" /></br>
		</label>
		<label>
		輸入姓名: <input type="text" name="name" /></br>
		</label>
		<label>
		輸入帳號: <input type="text" name="acc" /></br>
		</label>
		<label>
		輸入密碼: <input type="password" name="pw" /></br>
		</label>
		<label>
		重複輸入密碼: <input type="password" name="repw" /></br>
		</label>
		<label>
		輸入電子郵件: <input type="text" name="email" /></br>
		</label>		
		<label>
		<input type="submit" value="新增帳號" />
		</label>
	</form>
<footer>
	<?php
	include("share/_footer.php");
	?>
</footer>
</body>
</html>