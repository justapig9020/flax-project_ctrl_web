<html>
<head>
    <?php
	include("share/head.php");
	?>
	<link rel="stylesheet" type="text/css" href="/css/normal.css">
</head>
<body>
<header>
    <?php
    include("include/network.php");
	if (checkIn() == True) {
		header("location:overView.php");
	}
	include("include/sql.php");
	$page = "index";
	include("share/_header.php");
	?>	
</header>
<?php
    $retMesse = "";
    $retImage = "";
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
				$retMesse = "無此帳號";
			}else{
				$key = hash('sha256',$pw);
				if($row["pw"]==$key){
					$_SESSION["user"] = $row["id"];
					$_SESSION["ip"] = getIp();
					header("location:overView.php");
				}else{
                    $retMesse = "密碼錯誤";
                    $retImage = "<img src=\"image/crycry.png\">";
				}
			}
			$db=null;
		}else{
			echo "資料庫無法連線 請聯絡管理員</br>";
		}
		
	}
?>
<form id="login" name="login" method="post" action="">
	<font color="red"><?php echo $retMesse; ?></font></br>
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
    <?php
        echo $retImage;
    ?>
<footer>
	<?php
	include("share/_footer.php");
	?>
</footer>
</body>
</html>
