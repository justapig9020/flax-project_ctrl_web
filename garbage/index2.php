<?php
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = 'pw4d6f1na1';
$dbname = 'project_ctrl';
$ret = "";

if(isset($_POST['id']) and isset($_POST['pw']))
{
	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$test=@mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if ($test){
		echo "連線成功</br>";
		$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
		$id = $mysqli->escape_string($id);
		$select = sprintf("select * from user where account = %s",$id);
		$result = $db->query($select);
		
		if(!@mysqli_num_rows($result)){
			$ret = "無此帳號";
		}else{
			$ret = "有此帳號";
			//if(
		}
		$test->close();
	}else{
		echo "資料庫無法連線 請聯絡管理員</br>";
	}
	
}
?>

<html>
	<head>
	<meta http-equiv="Content-Type"content="text/html;charset=utf-8">
	<title>專題進度管理</title>
	</head>
	<body>
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
		<a href="./signUp.php">新增帳號</a>
	</form>
	
	</body>
</html>
