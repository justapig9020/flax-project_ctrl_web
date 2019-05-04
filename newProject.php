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
	if (!checkIn()) {
		header("location:index.php");
	}
	include("include/sql.php");
	$page = "overview";
	include("share/_headerIn.php");
	?>	
</header>
<?php
$ret = "";
if(isset($_POST['intr'])
	and isset($_POST['name'])
	)
{
    $intr = $_POST['intr'];
    $name = $_POST['name'];
	$id = $_SESSION["user"];
    $db = str_con();
    if ($db){
        $sel = "select * from project where name=:name and (select user_id from do_proj where project_id = project.id and status = 0) = :id";
	    try {
			$ins = $db->prepare($sel);
			if($ins){
				$ins->bindParam(':name',$name);
				$ins->bindParam(':id',$id);
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
			$sel = "insert into project (name,intr) values (:name,:intr)";
			try {
		    	$ins = $db->prepare($sel); 
				$ins->bindParam(':name',$name);
				$ins->bindParam(':intr',$intr);
				$ins->execute();
			} catch (PDOException $e){
					
			}
			$sel = "insert into do_proj (user_id,project_id,status) values (:id,(select id from project order by id desc limit 1),0)";
			try {
		    	$ins = $db->prepare($sel); 
				$ins->bindParam(':id',$id);
				$ins->execute();
			} catch (PDOException $e){
					
			}
			$ndir = sprintf("mkdir \"users/%s/%s\\\"",$id,$name);
			shell_exec($ndir);
			$ret = "完成";
		}else{
			$ret = "專案已存在";
		}
		$db = null;
	}else{
		$ret = "資料庫無法連線 請聯絡管理員</br>";
	}
}
?>
	<font color="red"><?php echo $ret; ?></font></br>
	<form id="newProject" name="newProject" method="post" action="">	
		<label>
		專案名稱: <input type="text" name="name" /></br>
		</label>
		<label>
		專案簡介: <input type="text" name="intr" /></br>
		</label>		
		<label>
		<input type="submit" value="新增專案" />
		</label>
	</form>
<footer>
	<?php
	include("share/_footer.php");
	?>
</footer>
</body>
</html>
