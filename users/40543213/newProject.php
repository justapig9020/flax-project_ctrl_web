<html>
<head>
	<?php
	include("../../share/head.php");
	?>
</head>
<body>
<?php
$dir = basename(__DIR__);
include("../../share/login.php");
?>

<header>
	<?php
	$file = basename(__FILE__,".php");
	include("../../share/_headerIN.php");
	?>
</header>
Create new project</br>
<form id="login" name="form1" method="post" action="">
		<font color="red"><?php echo $ret; ?></font></br>
		<label>
		專案名稱: <input type="text" name="id" /></br>
		</label>
		<label>
		專案簡介: <input type="text" name="name" /></br>
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
	include("../../share/_footer.php");
	?>
</footer>
</body>
</html>